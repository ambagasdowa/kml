/*
 * jQuery Dynatable plugin 0.3.1
 *
 * Copyright (c) 2014 Steve Schwartz (JangoSteve)
 *
 * Dual licensed under the AGPL and Proprietary licenses:
 *   http://www.dynatable.com/license/
 *
 * Date: Tue Jan 02 2014
 */
//

(function($) {
  var defaults,
      mergeSettings,
      dt,
      Model,
      modelPrototypes = {
        dom: Dom,
        domColumns: DomColumns,
        records: Records,
        recordsCount: RecordsCount,
        processingIndicator: ProcessingIndicator,
        state: State,
        sorts: Sorts,
        sortsHeaders: SortsHeaders,
        queries: Queries,
        inputsSearch: InputsSearch,
        paginationPage: PaginationPage,
        paginationPerPage: PaginationPerPage,
        paginationLinks: PaginationLinks
      },
      utility,
      build,
      processAll,
      initModel,
      defaultRowWriter,
      defaultCellWriter,
      defaultAttributeWriter,
      defaultAttributeReader;

  //-----------------------------------------------------------------
  // Cached plugin global defaults
  //-----------------------------------------------------------------

  defaults = {
    features: {
      paginate: true,
      sort: true,
      pushState: true,
      search: true,
      recordCount: true,
      perPageSelect: true
    },
    table: {
      defaultColumnIdStyle: 'camelCase',
      columns: null,
      headRowSelector: 'thead tr', // or e.g. tr:first-child
      bodyRowSelector: 'tbody tr',
      headRowClass: null,
      copyHeaderAlignment: true,
      copyHeaderClass: false
    },
    inputs: {
      queries: null,
      sorts: null,
      multisort: ['ctrlKey', 'shiftKey', 'metaKey'],
      page: null,
      queryEvent: 'blur change',
      recordCountTarget: null,
      recordCountPlacement: 'after',
      paginationLinkTarget: null,
      paginationLinkPlacement: 'after',
      paginationClass: 'dynatable-pagination-links',
      paginationLinkClass: 'dynatable-page-link',
      paginationPrevClass: 'dynatable-page-prev',
      paginationNextClass: 'dynatable-page-next',
      paginationActiveClass: 'dynatable-active-page',
      paginationDisabledClass: 'dynatable-disabled-page',
      paginationPrev: 'Previous',
      paginationNext: 'Next',
      paginationGap: [1,2,2,1],
      searchTarget: null,
      searchPlacement: 'before',
      searchText: 'Search: ',
      perPageTarget: null,
      perPagePlacement: 'before',
      perPageText: 'Show: ',
      pageText: 'Pages: ',
      recordCountPageBoundTemplate: '{pageLowerBound} to {pageUpperBound} of',
      recordCountPageUnboundedTemplate: '{recordsShown} of',
      recordCountTotalTemplate: '{recordsQueryCount} {collectionName}',
      recordCountFilteredTemplate: ' (filtered from {recordsTotal} total records)',
      recordCountText: 'Showing',
      recordCountTextTemplate: '{text} {pageTemplate} {totalTemplate} {filteredTemplate}',
      recordCountTemplate: '<span id="dynatable-record-count-{elementId}" class="dynatable-record-count">{textTemplate}</span>',
      processingText: 'Processing...'
    },
    dataset: {
      ajax: false,
      ajaxUrl: null,
      ajaxCache: null,
      ajaxOnLoad: false,
      ajaxMethod: 'GET',
      ajaxDataType: 'json',
      totalRecordCount: null,
      queries: {},
      queryRecordCount: null,
      page: null,
      perPageDefault: 10,
      perPageOptions: [10,20,50,100],
      sorts: {},
      sortsKeys: [],
      sortTypes: {},
      records: null
    },
    writers: {
      _rowWriter: defaultRowWriter,
      _cellWriter: defaultCellWriter,
      _attributeWriter: defaultAttributeWriter
    },
    readers: {
      _rowReader: null,
      _attributeReader: defaultAttributeReader
    },
    params: {
      dynatable: 'dynatable',
      queries: 'queries',
      sorts: 'sorts',
      page: 'page',
      perPage: 'perPage',
      offset: 'offset',
      records: 'records',
      record: null,
      queryRecordCount: 'queryRecordCount',
      totalRecordCount: 'totalRecordCount'
    }
  };

  //-----------------------------------------------------------------
  // Each dynatable instance inherits from this,
  // set properties specific to instance
  //-----------------------------------------------------------------

  dt = {
    init: function(element, options) {
      this.settings = mergeSettings(options);
      this.element = element;
      this.$element = $(element);

      // All the setup that doesn't require element or options
      build.call(this);

      return this;
    },

    process: function(skipPushState) {
      processAll.call(this, skipPushState);
    }
  };

  //-----------------------------------------------------------------
  // Cached plugin global functions
  //-----------------------------------------------------------------

  mergeSettings = function(options) {
    var newOptions = $.extend(true, {}, defaults, options);

    // TODO: figure out a better way to do this.
    // Doing `extend(true)` causes any elements that are arrays
    // to merge the default and options arrays instead of overriding the defaults.
    if (options) {
      if (options.inputs) {
        if (options.inputs.multisort) {
          newOptions.inputs.multisort = options.inputs.multisort;
        }
        if (options.inputs.paginationGap) {
          newOptions.inputs.paginationGap = options.inputs.paginationGap;
        }
      }
      if (options.dataset && options.dataset.perPageOptions) {
        newOptions.dataset.perPageOptions = options.dataset.perPageOptions;
      }
    }

    return newOptions;
  };

  build = function() {
    this.$element.trigger('dynatable:preinit', this);

    for (model in modelPrototypes) {
      if (modelPrototypes.hasOwnProperty(model)) {
        var modelInstance = this[model] = new modelPrototypes[model](this, this.settings);
        if (modelInstance.initOnLoad()) {
          modelInstance.init();
        }
      }
    }

    this.$element.trigger('dynatable:init', this);

    if (!this.settings.dataset.ajax || (this.settings.dataset.ajax && this.settings.dataset.ajaxOnLoad) || this.settings.features.paginate || (this.settings.features.sort && !$.isEmptyObject(this.settings.dataset.sorts))) {
      this.process();
    }
  };

  processAll = function(skipPushState) {
    var data = {};

    this.$element.trigger('dynatable:beforeProcess', data);

    if (!$.isEmptyObject(this.settings.dataset.queries)) { data[this.settings.params.queries] = this.settings.dataset.queries; }
    // TODO: Wrap this in a try/rescue block to hide the processing indicator and indicate something went wrong if error
    this.processingIndicator.show();

    if (this.settings.features.sort && !$.isEmptyObject(this.settings.dataset.sorts)) { data[this.settings.params.sorts] = this.settings.dataset.sorts; }
    if (this.settings.features.paginate && this.settings.dataset.page) {
      var page = this.settings.dataset.page,
          perPage = this.settings.dataset.perPage;
      data[this.settings.params.page] = page;
      data[this.settings.params.perPage] = perPage;
      data[this.settings.params.offset] = (page - 1) * perPage;
    }
    if (this.settings.dataset.ajaxData) { $.extend(data, this.settings.dataset.ajaxData); }

    // If ajax, sends query to ajaxUrl with queries and sorts serialized and appended in ajax data
    // otherwise, executes queries and sorts on in-page data
    if (this.settings.dataset.ajax) {
      var _this = this;
      var options = {
        type: _this.settings.dataset.ajaxMethod,
        dataType: _this.settings.dataset.ajaxDataType,
        data: data,
        error: function(xhr, error) {
          _this.$element.trigger('dynatable:ajax:error', {xhr: xhr, error : error});
        },
        success: function(response) {
          _this.$element.trigger('dynatable:ajax:success', response);
          // Merge ajax results and meta-data into dynatables cached data
          _this.records.updateFromJson(response);
          // update table with new records
          _this.dom.update();

          if (!skipPushState && _this.state.initOnLoad()) {
            _this.state.push(data);
          }
        },
        complete: function() {
          _this.processingIndicator.hide();
        }
      };
      // Do not pass url to `ajax` options if blank
      if (this.settings.dataset.ajaxUrl) {
        options.url = this.settings.dataset.ajaxUrl;

      // If ajaxUrl is blank, then we're using the current page URL,
      // we need to strip out any query, sort, or page data controlled by dynatable
      // that may have been in URL when page loaded, so that it doesn't conflict with
      // what's passed in with the data ajax parameter
      } else {
        options.url = utility.refreshQueryString(window.location.href, {}, this.settings);
      }
      if (this.settings.dataset.ajaxCache !== null) { options.cache = this.settings.dataset.ajaxCache; }

      $.ajax(options);
    } else {
      this.records.resetOriginal();
      this.queries.run();
      if (this.settings.features.sort) {
        this.records.sort();
      }
      if (this.settings.features.paginate) {
        this.records.paginate();
      }
      this.dom.update();
      this.processingIndicator.hide();

      if (!skipPushState && this.state.initOnLoad()) {
        this.state.push(data);
      }
    }

    this.$element.addClass('dynatable-loaded');
    this.$element.trigger('dynatable:afterProcess', data);
  };

  function defaultRowWriter(rowIndex, record, columns, cellWriter) {
    var tr = '';

    // grab the record's attribute for each column
    for (var i = 0, len = columns.length; i < len; i++) {
      tr += cellWriter(columns[i], record);
    }

    return '<tr>' + tr + '</tr>';
  };

  function defaultCellWriter(column, record) {
    var html = column.attributeWriter(record),
        td = '<td';

    if (column.hidden || column.textAlign) {
      td += ' style="';

      // keep cells for hidden column headers hidden
      if (column.hidden) {
        td += 'display: none;';
      }

      // keep cells aligned as their column headers are aligned
      if (column.textAlign) {
        td += 'text-align: ' + column.textAlign + ';';
      }

      td += '"';
    }

    if (column.cssClass) {
      td += ' class="' + column.cssClass + '"';
    }

    return td + '>' + html + '</td>';
  };

  function defaultAttributeWriter(record) {
    // `this` is the column object in settings.columns
    // TODO: automatically convert common types, such as arrays and objects, to string
    return record[this.id];
  };

  function defaultAttributeReader(cell, record) {
    return $(cell).html();
  };

  //-----------------------------------------------------------------
  // Dynatable object model prototype
  // (all object models get these default functions)
  //-----------------------------------------------------------------

  Model = {
    initOnLoad: function() {
      return true;
    },

    init: function() {}
  };

  for (model in modelPrototypes) {
    if (modelPrototypes.hasOwnProperty(model)) {
      var modelPrototype = modelPrototypes[model];
      modelPrototype.prototype = Model;
    }
  }

  //-----------------------------------------------------------------
  // Dynatable object models
  //-----------------------------------------------------------------

  function Dom(obj, settings) {
    var _this = this;

    // update table contents with new records array
    // from query (whether ajax or not)
    this.update = function() {
      var rows = '',
          columns = settings.table.columns,
          rowWriter = settings.writers._rowWriter,
          cellWriter = settings.writers._cellWriter;

      obj.$element.trigger('dynatable:beforeUpdate', rows);

      // loop through records
      for (var i = 0, len = settings.dataset.records.length; i < len; i++) {
        var record = settings.dataset.records[i],
            tr = rowWriter(i, record, columns, cellWriter);
        rows += tr;
      }

      // Appended dynatable interactive elements
      if (settings.features.recordCount) {
        $('#dynatable-record-count-' + obj.element.id).replaceWith(obj.recordsCount.create());
      }
      if (settings.features.paginate) {
        $('#dynatable-pagination-links-' + obj.element.id).replaceWith(obj.paginationLinks.create());
        if (settings.features.perPageSelect) {
          $('#dynatable-per-page-' + obj.element.id).val(parseInt(settings.dataset.perPage));
        }
      }

      // Sort headers functionality
      if (settings.features.sort && columns) {
        obj.sortsHeaders.removeAllArrows();
        for (var i = 0, len = columns.length; i < len; i++) {
          var column = columns[i],
              sortedByColumn = utility.allMatch(settings.dataset.sorts, column.sorts, function(sorts, sort) { return sort in sorts; }),
              value = settings.dataset.sorts[column.sorts[0]];

          if (sortedByColumn) {
            obj.$element.find('[data-dynatable-column="' + column.id + '"]').find('.dynatable-sort-header').each(function(){
              if (value == 1) {
                obj.sortsHeaders.appendArrowUp($(this));
              } else {
                obj.sortsHeaders.appendArrowDown($(this));
              }
            });
          }
        }
      }

      // Query search functionality
      if (settings.inputs.queries || settings.features.search) {
        var allQueries = settings.inputs.queries || $();
        if (settings.features.search) {
          allQueries = allQueries.add('#dynatable-query-search-' + obj.element.id);
        }

        allQueries.each(function() {
          var $this = $(this),
              q = settings.dataset.queries[$this.data('dynatable-query')];
          $this.val(q || '');
        });
      }

      obj.$element.find(settings.table.bodyRowSelector).remove();
      obj.$element.append(rows);

      obj.$element.trigger('dynatable:afterUpdate', rows);
    };
  };

  function DomColumns(obj, settings) {
    var _this = this;

    this.initOnLoad = function() {
      return obj.$element.is('table');
    };

    this.init = function() {
      settings.table.columns = [];
      this.getFromTable();
    };

    // initialize table[columns] array
    this.getFromTable = function() {
      var $columns = obj.$element.find(settings.table.headRowSelector).children('th,td');
      if ($columns.length) {
        $columns.each(function(index){
          _this.add($(this), index, true);
        });
      } else {
        return $.error("Couldn't find any columns headers in '" + settings.table.headRowSelector + " th,td'. If your header row is different, specify the selector in the table: headRowSelector option.");
      }
    };

    this.add = function($column, position, skipAppend, skipUpdate) {
      var columns = settings.table.columns,
          label = $column.text(),
          id = $column.data('dynatable-column') || utility.normalizeText(label, settings.table.defaultColumnIdStyle),
          dataSorts = $column.data('dynatable-sorts'),
          sorts = dataSorts ? $.map(dataSorts.split(','), function(text) { return $.trim(text); }) : [id];

      // If the column id is blank, generate an id for it
      if ( !id ) {
        this.generate($column);
        id = $column.data('dynatable-column');
      }
      // Add column data to plugin instance
      columns.splice(position, 0, {
        index: position,
        label: label,
        id: id,
        attributeWriter: settings.writers[id] || settings.writers._attributeWriter,
        attributeReader: settings.readers[id] || settings.readers._attributeReader,
        sorts: sorts,
        hidden: $column.css('display') === 'none',
        textAlign: settings.table.copyHeaderAlignment && $column.css('text-align'),
        cssClass: settings.table.copyHeaderClass && $column.attr('class')
      });

      // Modify header cell
      $column
        .attr('data-dynatable-column', id)
        .addClass('dynatable-head');
      if (settings.table.headRowClass) { $column.addClass(settings.table.headRowClass); }

      // Append column header to table
      if (!skipAppend) {
        var domPosition = position + 1,
            $sibling = obj.$element.find(settings.table.headRowSelector)
              .children('th:nth-child(' + domPosition + '),td:nth-child(' + domPosition + ')').first(),
            columnsAfter = columns.slice(position + 1, columns.length);

        if ($sibling.length) {
          $sibling.before($column);
        // sibling column doesn't yet exist (maybe this is the last column in the header row)
        } else {
          obj.$element.find(settings.table.headRowSelector).append($column);
        }

        obj.sortsHeaders.attachOne($column.get());

        // increment the index of all columns after this one that was just inserted
        if (columnsAfter.length) {
          for (var i = 0, len = columnsAfter.length; i < len; i++) {
            columnsAfter[i].index += 1;
          }
        }

        if (!skipUpdate) {
          obj.dom.update();
        }
      }

      return dt;
    };

    this.remove = function(columnIndexOrId) {
      var columns = settings.table.columns,
          length = columns.length;

      if (typeof(columnIndexOrId) === "number") {
        var column = columns[columnIndexOrId];
        this.removeFromTable(column.id);
        this.removeFromArray(columnIndexOrId);
      } else {
        // Traverse columns array in reverse order so that subsequent indices
        // don't get messed up when we delete an item from the array in an iteration
        for (var i = columns.length - 1; i >= 0; i--) {
          var column = columns[i];

          if (column.id === columnIndexOrId) {
            this.removeFromTable(columnIndexOrId);
            this.removeFromArray(i);
          }
        }
      }

      obj.dom.update();
    };

    this.removeFromTable = function(columnId) {
      obj.$element.find(settings.table.headRowSelector).children('[data-dynatable-column="' + columnId + '"]').first()
        .remove();
    };

    this.removeFromArray = function(index) {
      var columns = settings.table.columns,
          adjustColumns;
      columns.splice(index, 1);
      adjustColumns = columns.slice(index, columns.length);
      for (var i = 0, len = adjustColumns.length; i < len; i++) {
        adjustColumns[i].index -= 1;
      }
    };

    this.generate = function($cell) {
      var cell = $cell === undefined ? $('<th></th>') : $cell;
      return this.attachGeneratedAttributes(cell);
    };

    this.attachGeneratedAttributes = function($cell) {
      // Use increment to create unique column name that is the same each time the page is reloaded,
      // in order to avoid errors with mismatched attribute names when loading cached `dataset.records` array
      var increment = obj.$element.find(settings.table.headRowSelector).children('th[data-dynatable-generated]').length;
      return $cell
        .attr('data-dynatable-column', 'dynatable-generated-' + increment) //+ utility.randomHash(),
        .attr('data-dynatable-no-sort', 'true')
        .attr('data-dynatable-generated', increment);
    };
  };

  function Records(obj, settings) {
    var _this = this;

    this.initOnLoad = function() {
      return !settings.dataset.ajax;
    };

    this.init = function() {
      if (settings.dataset.records === null) {
        settings.dataset.records = this.getFromTable();

        if (!settings.dataset.queryRecordCount) {
          settings.dataset.queryRecordCount = this.count();
        }

        if (!settings.dataset.totalRecordCount){
          settings.dataset.totalRecordCount = settings.dataset.queryRecordCount;
        }
      }

      // Create cache of original full recordset (unpaginated and unqueried)
      settings.dataset.originalRecords = $.extend(true, [], settings.dataset.records);
    };

    // merge ajax response json with cached data including
    // meta-data and records
    this.updateFromJson = function(data) {
      var records;
      if (settings.params.records === "_root") {
        records = data;
      } else if (settings.params.records in data) {
        records = data[settings.params.records];
      }
      if (settings.params.record) {
        var len = records.length - 1;
        for (var i = 0; i < len; i++) {
          records[i] = records[i][settings.params.record];
        }
      }
      if (settings.params.queryRecordCount in data) {
        settings.dataset.queryRecordCount = data[settings.params.queryRecordCount];
      }
      if (settings.params.totalRecordCount in data) {
        settings.dataset.totalRecordCount = data[settings.params.totalRecordCount];
      }
      settings.dataset.records = records;
    };

    // For really advanced sorting,
    // see http://james.padolsey.com/javascript/sorting-elements-with-jquery/
    this.sort = function() {
      var sort = [].sort,
          sorts = settings.dataset.sorts,
          sortsKeys = settings.dataset.sortsKeys,
          sortTypes = settings.dataset.sortTypes;

      var sortFunction = function(a, b) {
        var comparison;
        if ($.isEmptyObject(sorts)) {
          comparison = obj.sorts.functions['originalPlacement'](a, b);
        } else {
          for (var i = 0, len = sortsKeys.length; i < len; i++) {
            var attr = sortsKeys[i],
                direction = sorts[attr],
                sortType = sortTypes[attr] || obj.sorts.guessType(a, b, attr);
            comparison = obj.sorts.functions[sortType](a, b, attr, direction);
            // Don't need to sort any further unless this sort is a tie between a and b,
            // so break the for loop unless tied
            if (comparison !== 0) { break; }
          }
        }
        return comparison;
      }

      return sort.call(settings.dataset.records, sortFunction);
    };

    this.paginate = function() {
      var bounds = this.pageBounds(),
          first = bounds[0], last = bounds[1];
      settings.dataset.records = settings.dataset.records.slice(first, last);
    };

    this.resetOriginal = function() {
      settings.dataset.records = settings.dataset.originalRecords || [];
    };

    this.pageBounds = function() {
      var page = settings.dataset.page || 1,
          first = (page - 1) * settings.dataset.perPage,
          last = Math.min(first + settings.dataset.perPage, settings.dataset.queryRecordCount);
      return [first,last];
    };

    // get initial recordset to populate table
    // if ajax, call ajaxUrl
    // otherwise, initialize from in-table records
    this.getFromTable = function() {
      var records = [],
          columns = settings.table.columns,
          tableRecords = obj.$element.find(settings.table.bodyRowSelector);

      tableRecords.each(function(index){
        var record = {};
        record['dynatable-original-index'] = index;
        $(this).find('th,td').each(function(index) {
          if (columns[index] === undefined) {
            // Header cell didn't exist for this column, so let's generate and append
            // a new header cell with a randomly generated name (so we can store and
            // retrieve the contents of this column for each record)
            obj.domColumns.add(obj.domColumns.generate(), columns.length, false, true); // don't skipAppend, do skipUpdate
          }
          var value = columns[index].attributeReader(this, record),
              attr = columns[index].id;

          // If value from table is HTML, let's get and cache the text equivalent for
          // the default string sorting, since it rarely makes sense for sort headers
          // to sort based on HTML tags.
          if (typeof(value) === "string" && value.match(/\s*\<.+\>/)) {
            if (! record['dynatable-sortable-text']) {
              record['dynatable-sortable-text'] = {};
            }
            record['dynatable-sortable-text'][attr] = $.trim($('<div></div>').html(value).text());
          }

          record[attr] = value;
        });
        // Allow configuration function which alters record based on attributes of
        // table row (e.g. from html5 data- attributes)
        if (typeof(settings.readers._rowReader) === "function") {
          settings.readers._rowReader(index, this, record);
        }
        records.push(record);
      });
      return records; // 1st row is header
    };

    // count records from table
    this.count = function() {
      return settings.dataset.records.length;
    };
  };

  function RecordsCount(obj, settcorazón a los nervios, y aumentándose así este dolor, se prolongaba la muerte.Como me hallase de este modo lleno de dolores, abrí los ojos y vi a mi Madre que estaba llorando, cuyo corazón se hallaba lleno de amargura, con todos sus miembros yertos y pálidos, y sus ayes y gemidos me atormentaban más que mi propio dolor. Vi también a mis amigos estar en suma ansiedad, y algunos casi dudaban, pero otros conservaban, aunque muy trastornados. Hallándome yo en tan cruel agonía y continuando en tan graves amarguras, rompióse al fin mi corazón con la violencia de la pasión, y salió mi alma, al salir la cual alzóse un poco la cabeza, estremeciéronse todos los miembros, abriéronse los ojos como a la mitad, y apoyándose en los pies todo el peso del cuerpo, quedé colgando como un lienzo hecho jirones. Esto padecí yo, tu Creador, y nadie hay que lo considere, y de ello me quejo delante de ti, para que pienses lo que yo hice, y cómo se me paga.Te ruego, en segundo lugar, que trabajes conmigo. Todo el que deseare hacer alguna obra, debe tener tres cosas: primera, la materia de que se haga la obra; segunda, los instrumentos con que haya de hacerse; y tercera, una esmerada premeditación para que se haga bien. Yo mismo soy la materia y la sabiduría misma, la cual y de la cual dimana toda sabiduría, puesto que he enviado mis palabras al mundo. Los instrumentos son mis amigos.Recoge, pues, mis palabras, y mira si están frescas y no corrompidas, si indican y tienen el sabor de la fe sana y recta; mira si son dignas y adecuadas para mi tesoro; considera si encaminan del amor del mundo al amor de Dios, de la senda del infierno a la altura del cielo, y si así las hallares, procura mi honra con mis amigos, como con buenos instrumentos; procúrala con prudencia como el hombre sabio; trabaja varonilmente, como el varon fuerte, trabaja con fervor, como amigo del Señor.Te mando, en tercer lugar, como Señor, para que acabes lo que has comenzado. Tú fuiste por mi camino, echaste tu arado en una pequeña porción de tierra y principiaste a arar. Mas ahora te mando que vuelvas con mayor frecuencia, que estirpes las raíces y espinas, y edifiques allí iglesias con los bienes de tu iglesia, pues entrego en tus manos esa parte de la tierra, y esa reclamo de ti. Por tanto, trabaja con fervor y asuduidad.Refiriéndome ahora a los posesos, digo que se admiran algunos de que el espíritu no se aparte del poseído, y en esto pueden considerar mi grandísima justicia, pues yo no le hago mayor injuria al demonio que al ángel en el cielo. Y pues es justicia que como una cosa viene, así se retire; y pues el espíritu llega alguna vez desde lejos, así también se retirará lentamente.Tres clases de demonios hay. Una es como el aire, que con facilidad se escurre, y obscurece la conciencia del hombre para que hable y haga cosas impúdicas: esta clase de espíritus malos viene fácilmente, y sale lo mismo.La segunda clase es como el fuego, que con la impaciencia aflige todo el cuerpo y la carne, y hace al hombre la vida tan amarga, que desearía morir más que vivir, y por impaciencia es impelido a todo lo que le sugiere aquel espíritu impuro: esta clase tan fácilmente como viene, sale, pero quedando la dolencia en el cuerpo.La tercera clase de demonios es como el humo, y al modo que el humo dondequiera que entra, lo mancha todo y se mezcla con todas las cosas, así también esta clase de demonios se mezcla totalmente con el alma y cuerpo del hombre. Por tanto, como el humo cuando encuentra un agujero va saliendo poco a poco y desde lejos, de la misma manera este espíritu, que con las oraciones principió a salir, se irá poco a poco, hasta que el poseído se haya purificado por completo.Y cuando se hubieren derramado tantas lágrimas como son necesarias, y se hubieren hecho todas las abstinencias debidas, entonces saldrá del todo el mal espíritu, y el hombre se verá purificado; porque así como ese espíritu llegó paulatinamente y desde lejos, del mismo modo es justicia que se retire.Se acusa santa Brígida delante de la Virgen María de las distracciones de su mente, y cómo la Señora la consuela.Libro 9 - Capítulo 8Bendita seáis vos, Reina del cielo, le dice la Santa a la Virgen, que no despreciáis a ningún pecador, cuando de todo corazón os invoca. Dignaos oirme, aunque soy indigna de abrir mis labios para suplicaros. Sé, pues, que sin estar robustecida con vuestra ayuda, no puedo gobernarme a mí misma, porque mi cuerpo es como el animal indómito, que si no tiene puesto el freno en la boca, va corriendo a todos los parajes adonde acostumbra tener sus deleites. Mi voluntad es ligera como el ave, y continuamente quiere seguir sus frívolos pensamientos y cruzar por todas partes como las aves que vuelan. Os pido, pues, que se le ponga un freno a mi cuerpo, antes que quiera correa hacia alguna parte adonde desagradare a vuestro Hijo, y llevadlo donde pueda cumplir su voluntad. Ponedle también un cordel a esa ave, que es mi voluntad, para que no vuele más lejos de lo que sea del agrado de vuestro amadísimo Hijo.Y respondió la Virgen: La oración hecha con devoto corazón para honra de Dios, merece ser oída para concederle la gracia que pide. Y por tanto, a fin de que se ponga un freno a tu cuerpo para que sea regido según la voluntad de Dios, conviene que se te ponga también una carga, que hayas de llevar para honra de quien te gobierna, a fin de que tu voluntad sea tal, que más bien quieras callar que hablar con la gente del mundo, y te sea más grato sufrir en tu casa la pobreza, que disfrutar de todas las riquezas en los palacios de los príncipes, cuya amistad no estimas, con tal que pueda merecer la amistad de Dios. Así, pues te ponga la carga de que digas palabras que agraden a Dios.Simbólica visión de la Santa, en la que se le muestra la envidia de nuestro enemigo.Libro 9 - Capítulo 9Como en cierto tiempo estuviese orando santa Brígida, vió delante de sí en visión espiritual un escaso fuego y una ollita puesta sobre éste, y en ella una comida apetitosa. Vió también a un mancebo vestido de muy reluciente púrpura de oro, el cual, dobladas las rodillas estaba alrededor de la olla, unas veces soplando el fuego, otras moviendo la leña, y así la estaba cuidando, hasta que por último, dijo a la Santa que lo estaba mirando: Tú que estás viendo todo esto, ¿has visto jamás una persona tan humilde como soy yo?Yo, como ves, ataviado con vestiduras de oro, hago tamaños servicios a esta olla; dobladas las rodillas doy vuelta alrededor de ella, inclino la cabeza hasta la tierra soplando el fuego, arreglo y amontono la leña, a veces también la desvío sin escusarme molestia alguna; por tanto, reconóceme por muy humilde. Pero me importa manifestarte lo que esto significa. Por esa olla entiendo tu corazón; por la comida que en ella está, entiendo esas dulcísimas palabras que Dios te da desde lo alto; por el fuego, el fervor de amor divino que tienes de Dios.Yo soy el demonio, envidioso de tu consuelo, que me muestro tan humilde servidor, soplando no tanto para que arda más el fuego, como para que las cenizas, que son los afectos de las cosas de la tierra, suban a la olla, esto es, a tu corazón, a fin de que esa sabrosa comida, que son las palabras del Espíritu Santo que se te han inspirado, se hagan insípidas. Revuelvo las teas y la leña, para que la olla, que es tu corazón, se incline a la tierra, esto es, a personas conocidas de la tierra o parientes, a fin de que de este modo sea Dios menos amado.Revela Dios a un santo monje la santitud y virtud insigne de santa Brígida.Libro 9 - Capítulo 10Un monje de santa vida del mismo monasterio de Alvastro refirió con lágrimas y juramento al prior el P. Pedro, que cuando santa Brígida fué allí para residir en el mismo monasterio, se admiró el monje en su corazón, y por celo de la regla y de la santidad dijo interiormente: ¿Por qué esta señora habita aquí en el monasterio de los monjes contra nuestra regla e introduciendo una nueva costumbre? Arrebatado entonces en oración el mismo religioso, oyó en un arrobamiento mental una voz que le decía: Esa mujer es amiga de Dios, y viene al monasterio para coger flores debajo de este monte, con las ñor creado todas las cosas y particularmente al hombre, y que era justísimo juez de todos; entonces, al modo que las aguas salen en abundancia de un manantial, así desde el cerebro de la Virgen lanzábanse a la cumbre del cielo sus sentidos y entendimiento, y después corrían por el valle, esto es, por todo su humildísimo cuerpo.Pues así como dice la Iglesia que el Hijo de Dios salió del Padre y que su vuelta fué al Padre, aunque ninguno de ellos se apartó jamás del otro; igualmente los sentidos y entendimiento de la Virgen, elevándose con frecuencía a lo más alto de los cielos, veían constantemente a Dios por medio de la fe, con cuyo dulcísimo amor suavemente abrazada volvía a sí misma.Mantuvo con la mayor firmeza este amor con esperanza racional y temor divino, inflamando por medio del mismo amor su propia alma, de suerte, que comenzó a arder en amor de Dios como vehementísimo fuego. Los sentidos y entendimiento de la Virgen sometieron también de tal manera el cuerpo al alma para obedecer a Dios, que desde entonces le estuvo el cuerpo obediente con la mayor humildad.¡Con cuánta rapidez los sentidos y entendimiento de la Virgen comprendieron el amor de Dios! ¡Con cuánta prudencia se enriqueció a sí misma la Señora! Por consiguiente, como si hubiera sido trasplantado algún lirio, sujeto en la tierra por tres raices, con que estuviese más firme, y abriese arriba tres preciosas flores para deleitar la vista, del mismo modo el amor divino traspasado a esta gloriosa tierra, a nuestra santísima Virgen por virtud divina, se unió a su cuerpo con tres virtudes muy sólidas, como con tres raices por las cuales fortaleció también el mismo cuerpo de la Virgen, y con tres joyas, como con tres preciosísimas flores adornó honoríficamente a la Virgen respecto al alma, para alegría de Dios, de los ángeles y de cuantos la mirasen.La primera fortaleza de la discreta abstinencia del cuerpo de la Virgen moderaba en la Señora la comida y bebida, de suerte, que por ninguna superfluidad la apartó nunca del servicio de Dios la menor pereza, ni por la inmoderada parsimonia resultaba jamás sin fuerzas para obrar.La segunda fortaleza de la templanza de las vigilias gobernaba su cuerpo de tal manera, que por lo escaso del sueño en ningún tiempo en que debía estar en vela, se hallaba entorpecida con ninguna pesadez, ni por el mucho adormecimiento acortaba en lo más leve los períodos marcados de la vigilia.La tercera fortaleza de la robusta complexión del cuerpo de la Virgen hizo tan constante la misma virginidad, que con igual ánimo sobrellevaba el trabajo, la adversidad corporal y la felicidad pasajera del cuerpo, sin quejarse por la adversidad de éste y sin alegrarse por su dicha. Esta era también la primera joya con que el amor divino ataviaba a la Virgen respecto al alma, a saber, que prefería en su alma los premios que Dios había de conceder a sus amigos, a la hermosura de todas las cosas, y por consiguiente parecíanle vilísmo lodo todas las riquezas del mundo. Adornaba su alma como segunda joya el discernir perfectamente en su entendimiento cuán incomparable con la gloria del cielo es el honor del mundo, por lo que apartábase de oir la gloria mundana, como de aire corrompido, que con su hedor destruye en breve la vida de muchos.Como tercera joya, en fin, glorificaba el alma de la Virgen el considerar dulcísimas en su corazón todas las cosas gratas a Dios, y más amargas que la hiel las cosas odiosas y contrarias al Señor, y por tanto, la misma voluntad de la Virgen impelía su alma para desear la verdadera dulzura tan eficazmente, que después no debió sentir en esta vida amargura espiritual. Con estas joyas sobre todas las cosas creadas apareció la Virgen tan hermosamente adornada en su alma, que plugo al Creador cumplir todas sus promesas por mediación de la misma Señora.Hallábase esta tan fortalecida por la virtud del amor, que no se resfriaba en ninguna obra buena ni en el menor ápice prevalecía jamás sobre ella el enemigo. Debe, en efecto, creerse que, así como su alma era hermosísima delante de Dios y de los ángeles, igualmente su cuerpo fué gratísimo a los ojos de cuantos la miraban; y así como Dios y los ángeles se congratulaban en los cielos por la hermosura de su alma, igualmente la gratísima hermosura de su cuerpo fué provechosa y consoladora en la tierra a cuantos deseaban verla.Viendo, pues, las personas piadosas el gran fervor con que la Virgen servía a Dios, se hacían más celosas por la honra de Dios, y las personas propensas a pecar, cuando consideraban a la Virgen, resfriábanse al punto en el ardor del pecado con la honestidad de sus palabras y comportamiento.Feria Quinta. - Lección SegundaLibro 11 - Capítulo 14Bendición. Dignese borrar nuestros pecados la Virgen saludada por el Ángel. Amén.Ninguna lengua puede referir con cuánta sabiduría comprendieron a Dios los sentidos y entendimiento de la gloriosísima Virgen, en el mismo instante en que por primera vez tuvo conocimiento del Señor, principalmente porque toda inteligencia humana es débil para pensar las muchas formas con que se sometió al servicio de Dios la bendita voluntad de la Virgen, pues se complacía sobremanera en hacer todo cuanto conocía ser agradable a Dios.Conoció la Virgen que no por méritos suyos había el Señor creado su cuerpo y su alma y dádole a su voluntad la libertad de guardar humildemente los preceptos divinos, o de oponerse a ellos si quisiera; y así, determinó la humildísima voluntad de la Virgen, servir a Dios con el mayor amor durante toda su vida por los beneficios ya recibidos, aunque ya no le concediera más el Señor. Mas cuando el entendimiento de la Virgen pudo comprender que el mismo Creador de todas las almas se dignaría hacerse también Redentor de ellas, y que por recompensa de tan penoso trabajo, no desearía nada sino recobrar para sí las mismas almas, y que todo hombre en su mano tiene la libertad de aplacar a Dios con buenas obras, o de provocarlo a ira con malas acciones, comenzó la voluntad de la Virgen a dirigir atentamente su cuerpo en las borrascas del mundo, como el prudente piloto dirige su nave.Pues así como teme el piloto que con las oleadas pueda peligrar el buque, ni tampoco se apartan de su imaginación los escollos en que muchas veces se estrellan las naves, acomoda con firmeza las jarcias y pertrechos del buque, ésta contínuamente contemplando el puerto donde después del trabajo desea descansar, y cuida mucho lleguen debidamente a su verdadero dueño las riquezas contenidas en su nave, del mismo modo esa prudentísima Virgen, después de tener conocimiento de los mandatos de Dios, al punto según el espíritu de ellos comenzó su voluntad a dirigir con la mayor solicitud su cuerpo.Temía con frecuencia la Virgen el trato con los parientes, a fin de que no la entibiasen para servir a Dios con palabras o con obras la prosperidad o desgracia de ellos, las cuales se asemejan a los vaivenes del mundo. Tenía además presente de contínuo en la memoria todo lo prohibido por la ley divina, evitándolo con suma atención, a fin de que no perdiesen espiritualmente su alma, como tremendo escollo.Esta laudable voluntad dominó refrenando a la misma Virgen y sus sentidos de suerte que nunca se movía su lengua para palabras inútiles, y jamás se alzaron sus recatadísimos ojos para ver nada innecesario, sus oídos atendían sólo a lo perteneciente a la gloria de Dios, sus manos y dedos no se extendían sino para su utilidad propia o la del prójimo, y no permitía diesen sus pies un solo paso sin haber examinado antes el provecho que de ahí resultaría. Deseaba también la voluntad de la Virgen sufrir con placer todas las tribulaciones del mundo, para llegar al puerto de salvación, es decir, al seno de Dios Padre, anhelando constantemente que su alma restablecida diese grato honor al Señor, a quien sobremanera amaba.Y como la voluntad de la Virgen no careció jamás de bondad alguna, Dios, de quien dimanan todos los bienes, la exaltó muy sublimente en la cumbre de todas las virtudes y la hizo brillar con el mayor esplendor. ¿Quién no ha de admirarse de que haya Dios amado sobre todas las cosas a esta Virgen, cuando excepto ella sola, no conoció a nas.each(function() {
        var $this = $(this),
            event = $this.data('dynatable-query-event') || settings.inputs.queryEvent,
            query = $this.data('dynatable-query') || $this.attr('name') || this.id,
            queryFunction = function(e) {
              var q = $(this).val();
              if (q === "") { q = undefined; }
              if (q === settings.dataset.queries[query]) { return false; }
              if (q) {
                _this.add(query, q);
              } else {
                _this.remove(query);
              }
              obj.process();
              e.preventDefault();
            };

        $this
          .attr('data-dynatable-query', query)
          .bind(event, queryFunction)
          .bind('keypress', function(e) {
            if (e.which == 13) {
              queryFunction.call(this, e);
            }
          });

        if (settings.dataset.queries[query]) { $this.val(decodeURIComponent(settings.dataset.queries[query])); }
      });
    };

    // Query functions for in-page querying
    // each function should take a record and a value as input
    // and output true of false as to whether the record is a match or not
    this.functions = {
      search: function(record, queryValue) {
        var contains = false;
        // Loop through each attribute of record
        for (attr in record) {
          if (record.hasOwnProperty(attr)) {
            var attrValue = record[attr];
            if (typeof(attrValue) === "string" && attrValue.toLowerCase().indexOf(queryValue.toLowerCase()) !== -1) {
              contains = true;
              // Don't need to keep searching attributes once found
              break;
            } else {
              continue;
            }
          }
        }
        return contains;
      }
    };
  };

  function InputsSearch(obj, settings) {
    var _this = this;

    this.initOnLoad = function() {
      return settings.features.search;
    };

    this.init = function() {
      this.attach();
    };

    this.create = function() {
      var $search = $('<input />', {
            type: 'search',
            id: 'dynatable-query-search-' + obj.element.id,
            'data-dynatable-query': 'search',
            value: settings.dataset.queries.search
          }),
          $searchSpan = $('<span></span>', {
            id: 'dynatable-search-' + obj.element.id,
            'class': 'dynatable-search',
            text: settings.inputs.searchText
          }).append($search);

      $search
        .bind(settings.inputs.queryEvent, function() {
          obj.queries.runSearch($(this).val());
        })
        .bind('keypress', function(e) {
          if (e.which == 13) {
            obj.queries.runSearch($(this).val());
            e.preventDefault();
          }
        });
      return $searchSpan;
    };

    this.attach = function() {
      var $target = settings.inputs.searchTarget ? $(settings.inputs.searchTarget) : obj.$element;
      $target[settings.inputs.searchPlacement](this.create());
    };
  };

  // provide a public function for selecting page
  function PaginationPage(obj, settings) {
    this.initOnLoad = function() {
      return settings.features.paginate;
    };

    this.init = function() {
      var pageUrl = window.location.search.match(new RegExp(settings.params.page + '=([^&]*)'));
      // If page is present in URL parameters and pushState is enabled
      // (meaning that it'd be possible for dynatable to have put the
      // page parameter in the URL)
      if (pageUrl && settings.features.pushState) {
        this.set(pageUrl[1]);
      } else {
        this.set(1);
      }
    };

    this.set = function(page) {
      var newPage = parseInt(page, 10);
      settings.dataset.page = newPage;
      obj.$element.trigger('dynatable:page:set', newPage);
    }
  };

  function PaginationPerPage(obj, settings) {
    var _this = this;

    this.initOnLoad = function() {
      return settings.features.paginate;
    };

    this.init = function() {
      var perPageUrl = window.location.search.match(new RegExp(settings.params.perPage + '=([^&]*)'));

      // If perPage is present in URL parameters and pushState is enabled
      // (meaning that it'd be possible for dynatable to have put the
      // perPage parameter in the URL)
      if (perPageUrl && settings.features.pushState) {
        // Don't reset page to 1 on init, since it might override page
        // set on init from URL
        this.set(perPageUrl[1], true);
      } else {
        this.set(settings.dataset.perPageDefault, true);
      }

      if (settings.features.perPageSelect) {
        this.attach();
      }
    };

    this.create = function() {
      var $select = $('<select>', {
            id: 'dynatable-per-page-' + obj.element.id,
            'class': 'dynatable-per-page-select'
          });

      for (var i = 0, len = settings.dataset.perPageOptions.length; i < len; i++) {
        var number = settings.dataset.perPageOptions[i],
            selected = settings.dataset.perPage == number ? 'selected="selected"' : '';
        $select.append('<option value="' + number + '" ' + selected + '>' + number + '</option>');
      }

      $select.bind('change', function(e) {
        _this.set($(this).val());
        obj.process();
      });

      return $('<span />', {
        'class': 'dynatable-per-page'
      }).append("<span class='dynatable-per-page-label'>" + settings.inputs.perPageText + "</span>").append($select);
    };

    this.attach = function() {
      var $target = settings.inputs.perPageTarget ? $(settings.inputs.perPageTarget) : obj.$element;
      $target[settings.inputs.perPagePlacement](this.create());
    };

    this.set = function(number, skipResetPage) {
      var newPerPage = parseInt(number);
      if (!skipResetPage) { obj.paginationPage.set(1); }
      settings.dataset.perPage = newPerPage;
      obj.$element.trigger('dynatable:perPage:set', newPerPage);
    };
  };

  // pagination links which update dataset.page attribute
  function PaginationLinks(obj, settings) {
    var _this = this;

    this.initOnLoad = function() {
      return settings.features.paginate;
    };

    this.init = function() {
      this.attach();
    };

    this.create = function() {
      var pageLinks = '<ul id="' + 'dynatable-pagination-links-' + obj.element.id + '" class="' + settings.inputs.paginationClass + '">',
          pageLinkClass = settings.inputs.paginationLinkClass,
          activePageClass = settings.inputs.paginationActiveClass,
          disabledPageClass = settings.inputs.paginationDisabledClass,
          pages = Math.ceil(settings.dataset.queryRecordCount / settings.dataset.perPage),
          page = settings.dataset.page,
          breaks = [
            settings.inputs.paginationGap[0],
            settings.dataset.page - settings.inputs.paginationGap[1],
            settings.dataset.page + settings.inputs.paginationGap[2],
            (pages + 1) - settings.inputs.paginationGap[3]
          ];

      pageLinks += '<li><span>' + settings.inputs.pageText + '</span></li>';

      for (var i = 1; i <= pages; i++) {
        if ( (i > breaks[0] && i < breaks[1]) || (i > breaks[2] && i < breaks[3])) {
          // skip to next iteration in loop
          continue;
        } else {
          var li = obj.paginationLinks.buildLink(i, i, pageLinkClass, page == i, activePageClass),
              breakIndex,
              nextBreak;

          // If i is not between one of the following
          // (1 + (settings.paginationGap[0]))
          // (page - settings.paginationGap[1])
          // (page + settings.paginationGap[2])
          // (pages - settings.paginationGap[3])
          breakIndex = $.inArray(i, breaks);
          nextBreak = breaks[breakIndex + 1];
          if (breakIndex > 0 && i !== 1 && nextBreak && nextBreak > (i + 1)) {
            var ellip = '<li><span class="dynatable-page-break">&hellip;</span></li>';
            li = breakIndex < 2 ? ellip + li : li + ellip;
          }

          if (settings.inputs.paginationPrev && i === 1) {
            var prevLi = obj.paginationLinks.buildLink(page - 1, settings.inputs.paginationPrev, pageLinkClass + ' ' + settings.inputs.paginationPrevClass, page === 1, disabledPageClass);
            li = prevLi + li;
          }
          if (settings.inputs.paginationNext && i === pages) {
            var nextLi = obj.paginationLinks.buildLink(page + 1, settings.inputs.paginationNext, pageLinkClass + ' ' + settings.inputs.paginationNextClass, page === pages, disabledPageClass);
            li += nextLi;
          }

          pageLinks += li;
        }
      }

      pageLinks += '</ul>';

      // only bind page handler to non-active and non-disabled page links
      var selector = '#dynatable-pagination-links-' + obj.element.id + ' a.' + pageLinkClass + ':not(.' + activePageClass + ',.' + disabledPageClass + ')';
      // kill any existing delegated-bindings so they don't stack up
      $(document).undelegate(selector, 'click.dynatable');
      $(document).delegate(selector, 'click.dynatable', function(e) {
        $this = $(this);
        $this.closest(settings.inputs.paginationClass).find('.' + activePageClass).removeClass(activePageClass);
        $this.addClass(activePageClass);

        obj.paginationPage.set($this.data('dynatable-page'));
        obj.process();
        e.preventDefault();
      });

      return pageLinks;
    };

    this.buildLink = function(page, label, linkClass, conditional, conditionalClass) {
      var link = '<a data-dynatable-page=' + page + ' class="' + linkClass,
          li = '<li';

      if (conditional) {
        link += ' ' + conditionalClass;
        li += ' class="' + conditionalClass + '"';
      }

      link += '">' + label + '</a>';
      li += '>' + link + '</li>';

      return li;
    };

    this.attach = function() {
      // append page links *after* delegate-event-binding so it doesn't need to
      // find and select all page links to bind event
      var $target = settings.inputs.paginationLinkTarget ? $(settings.inputs.paginationLinkTarget) : obj.$element;
      $target[settings.inputs.paginationLinkPlacement](obj.paginationLinks.create());
    };
  };

  utility = dt.utility = {
    normalizeText: function(text, style) {
      text = this.textTransform[style](text);
      return text;
    },
    textTransform: {
      trimDash: function(text) {
        return text.replace(/^\s+|\s+$/g, "").replace(/\s+/g, "-");
      },
      camelCase: function(text) {
        text = this.trimDash(text);
        return text
          .replace(/(\-[a-zA-Z])/g, function($1){return $1.toUpperCase().replace('-','');})
          .replace(/([A-Z])([A-Z]+)/g, function($1,$2,$3){return $2 + $3.toLowerCase();})
          .replace(/^[A-Z]/, function($1){return $1.toLowerCase();});
      },
      dashed: function(text) {
        text = this.trimDash(text);
        return this.lowercase(text);
      },
      underscore: function(text) {
        text = this.trimDash(text);
        return this.lowercase(text.replace(/(-)/g, '_'));
      },
      lowercase: function(text) {
        return text.replace(/([A-Z])/g, function($1){return $1.toLowerCase();});
      }
    },
    // Deserialize params in URL to object
    // see http://stackoverflow.com/questions/1131630/javascript-jquery-param-inverse-function/3401265#3401265
    deserialize: function(query) {
      if (!query) return {};
      // modified to accept an array of partial URL strings
      if (typeof(query) === "object") { query = query.join('&'); }

      var hash = {},
          vars = query.split("&");

      for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split("="),
            k = decodeURIComponent(pair[0]),
            v, m;

        if (!pair[1]) { continue };
        v = decodeURIComponent(pair[1].replace(/\+/g, ' '));

        // modified to parse multi-level parameters (e.g. "hi[there][dude]=whatsup" => hi: {there: {dude: "whatsup"}})
        while (m = k.match(/([^&=]+)\[([^&=]+)\]$/)) {
          var origV = v;
          k = m[1];
          v = {};

          // If nested param ends in '][', then the regex above erroneously included half of a trailing '[]',
          // which indicates the end-value is part of an array
          if (m[2].substr(m[2].length-2) == '][') { // must use substr for IE to understand it
            v[m[2].substr(0,m[2].length-2)] = [origV];
          } else {
            v[m[2]] = origV;
          }
        }

        // If it is the first entry with this name
        if (typeof hash[k] === "undefined") {
          if (k.substr(k.length-2) != '[]') { // not end with []. cannot use negative index as IE doesn't understand it
            hash[k] = v;
          } else {
            hash[k] = [v];
          }
        // If subsequent entry with this name and not array
        } else if (typeof hash[k] === "string") {
          hash[k] = v;  // replace it
        // modified to add support for objects
        } else if (typeof hash[k] === "object") {
          hash[k] = $.extend({}, hash[k], v);
        // If subsequent entry with this name and is array
        } else {
          hash[k].push(v);
        }
      }
      return hash;
    },
    refreshQueryString: function(urlString, data, settings) {
      var _this = this,
          queryString = urlString.split('?'),
          path = queryString.shift(),
          urlOptions;

      urlOptions = this.deserialize(urlString);

      // Loop through each dynatable param and update the URL with it
      for (attr in settings.params) {
        if (settings.params.hasOwnProperty(attr)) {
          var label = settings.params[attr];
          // Skip over parameters matching attributes for disabled features (i.e. leave them untouched),
          // because if the feature is turned off, then parameter name is a coincidence and it's unrelated to dynatable.
          if (
            (!settings.features.sort && attr == "sorts") ||
              (!settings.features.paginate && _this.anyMatch(attr, ["page", "perPage", "offset"], function(attr, param) { return attr == param; }))
          ) {
            continue;
          }

          // Delete page and offset from url params if on page 1 (default)
          if ((attr === "page" || attr === "offset") && data["page"] === 1) {
            if (urlOptions[label]) {
              delete urlOptions[label];
            }
            continue;
          }

          // Delete perPage from url params if default perPage value
          if (attr === "perPage" && data[label] == settings.dataset.perPageDefault) {
            if (urlOptions[label]) {
              delete urlOptions[label];
            }
            continue;
          }

          // For queries, we're going to handle each possible query parameter individually here instead of
          // handling the entire queries object below, since we need to make sure that this is a query controlled by dynatable.
          if (attr == "queries" && data[label]) {
            var queries = settings.inputs.queries || [],
                inputQueries = $.makeArray(queries.map(function() { return $(this).attr('name') }));

            if (settings.features.search) { inputQueries.push('search'); }

            for (var i = 0, len = inputQueries.length; i < len; i++) {
              var attr = inputQueries[i];
              if (data[label][attr]) {
                if (typeof urlOptions[label] === 'undefined') { urlOptions[label] = {}; }
                urlOptions[label][attr] = data[label][attr];
              } else {
                if (urlOptions && urlOptions[label] && urlOptions[label][attr]) { delete urlOptions[label][attr]; }
              }
            }
            continue;
          }

          // If we haven't returned true by now, then we actually want to update the parameter in the URL
          if (data[label]) {
            urlOptions[label] = data[label];
          } else {
            delete urlOptions[label];
          }
        }
      }
      return $.param(urlOptions);
    },
    // Get array of keys from object
    // see http://stackoverflow.com/questions/208016/how-to-list-the-properties-of-a-javascript-object/208020#208020
    keysFromObject: function(obj){
      var keys = [];
      for (var key in obj){
        keys.push(key);
      }
      return keys;
    },
    // Find an object in an array of objects by attributes.
    // E.g. find object with {id: 'hi', name: 'there'} in an array of objects
    findObjectInArray: function(array, objectAttr) {
      var _this = this,
          foundObject;
      for (var i = 0, len = array.length; i < len; i++) {
        var item = array[i];
        // For each object in array, test to make sure all attributes in objectAttr match
        if (_this.allMatch(item, objectAttr, function(item, key, value) { return item[key] == value; })) {
          foundObject = item;
          break;
        }
      }
      return foundObject;
    },
    // Return true if supplied test function passes for ALL items in an array
    allMatch: function(item, arrayOrObject, test) {
      // start off with true result by default
      var match = true,
          isArray = $.isArray(arrayOrObject);
      // Loop through all items in array
      $.each(arrayOrObject, function(key, value) {
        var result = isArray ? test(item, value) : test(item, key, value);
        // If a single item tests false, go ahead and break the array by returning false
        // and return false as result,
        // otherwise, continue with next iteration in loop
        // (if we make it through all iterations without overriding match with false,
        // then we can return the true result we started with by default)
        if (!result) { return match = false; }
      });
      return match;
    },
    // Return true if supplied test function passes for ANY items in an array
    anyMatch: function(item, arrayOrObject, test) {
      var match = false,
          isArray = $.isArray(arrayOrObject);

      $.each(arrayOrObject, function(key, value) {
        var result = isArray ? test(item, value) : test(item, key, value);
        if (result) {
          // As soon as a match is found, set match to true, and return false to stop the `$.each` loop
          match = true;
          return false;
        }
      });
      return match;
    },
    // Return true if two objects are equal
    // (i.e. have the same attributes and attribute values)
    objectsEqual: function(a, b) {
      for (attr in a) {
        if (a.hasOwnProperty(attr)) {
          if (!b.hasOwnProperty(attr) || a[attr] !== b[attr]) {
            return false;
          }
        }
      }
      for (attr in b) {
        if (b.hasOwnProperty(attr) && !a.hasOwnProperty(attr)) {
          return false;
        }
      }
      return true;
    },
    // Taken from http://stackoverflow.com/questions/105034/how-to-create-a-guid-uuid-in-javascript/105074#105074
    randomHash: function() {
      return (((1+Math.random())*0x10000)|0).toString(16).substring(1);
    },
    // Adapted from http://stackoverflow.com/questions/377961/efficient-javascript-string-replacement/378001#378001
    template: function(str, data) {
      return str.replace(/{(\w*)}/g, function(match, key) {
        return data.hasOwnProperty(key) ? data[key] : "";
      });
    }
  };

  //-----------------------------------------------------------------
  // Build the dynatable plugin
  //-----------------------------------------------------------------

  // Object.create support test, and fallback for browsers without it
  if ( typeof Object.create !== "function" ) {
    Object.create = function (o) {
      function F() {}
      F.prototype = o;
      return new F();
    };
  }

  //-----------------------------------------------------------------
  // Global dynatable plugin setting defaults
  //-----------------------------------------------------------------

  $.dynatableSetup = function(options) {
    defaults = mergeSettings(options);
  };

  // Create dynatable plugin based on a defined object
  $.dynatable = function( object ) {
    $.fn['dynatable'] = function( options ) {
      return this.each(function() {
        if ( ! $.data( this, 'dynatable' ) ) {
          $.data( this, 'dynatable', Object.create(object).init(this, options) );
        }
      });
    };
  };

  $.dynatable(dt);

})(jQuery);
