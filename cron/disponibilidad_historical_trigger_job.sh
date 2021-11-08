
#ip=192.168.20.235
ip=10.8.0.235
odbc_srv='IntegraDb'
usr='zam'
pass='lis'
database='gstdb'


#sqsh -S SERV -U user -P passwd -D db -L bcp_colsep=',' -m bcp 
#	-C 'select * from some_table where foo=bar' > /path/to/output.out

# Define table variable

sqsh -S $odbc_srv -U $usr -P $pass -D $database -L bcp_colsep=' ' -m bcp -C " insert into 
                                                                        	sistemas.dbo.disponibilidad_tbl_hist_unidades_gst_indicators
                                                                        	select
                                                                        				 unidad, id_flota, flota, xid_status, xestatus, id_status, estatus, tipo_status, clasification_name
                                                                        				,group_name, operador, remolque, id_area, area, id_tipo_operacion, segmento, description, compromise
                                                                        				,status_viaje, desc_viaje, status_taller, desc_taller, units_type, 0 --as 'iseditable'
                                                                        				, id_area_taller, area_taller
                                                                        				,id_orden, fecha_inicio,fecha_ingreso, fecha_prometida
                                                                        				,lastTrip
                                                                        				,id_remolque1
                                                                        				,id_remolque2
                                                                        				,id_dolly
                                                                        				,f_despachado
                                                                        				,StatusDays
                                                                        				,convert(nvarchar(max),current_timestamp,23) --'2021-08-10' --created
                                                                        				,1 -- status
                                                                        	from
                                                                        				sistemas.dbo.disponibilidad_currentview_rpt_unidades_gst_indicators
                                                                        --	where 
                                                                        --				created =  convert(nvarchar(max),current_timestamp,23)"  
