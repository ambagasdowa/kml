use portal_secure;
show tables;
select count(`id`) as "cursos_disponibles" from `secure_topics` where `status` = '1';

select * from `secure_control_users` where `course_is_taken` = '1' and year(`create`) = '2016';

select count(`id`) as "total_cursos" from `secure_control_users` where `course_is_taken` = '1':

select * from view_get_payrolls;


	select 
			count(Cvetra) as 'workers',Cvepue,Nomina,
			Company,Area,Departamento,Puesto,Cvepue 
	from 		view_get_payrolls 
	group by 	Cvepue,Nomina,Company,Area,Departamento,Puesto,Cvepue
	order by Company;
	
	
-- 	Get the current Operators list
	select
			count(Cvetra) as 'workers',Nomina,
			Company,Area,Departamento,Puesto,Cvepue 
	from
			view_get_payrolls
	where
			Cvepue in ('000017','000026','000028') -- operadores de tractocamion
		and
			Puesto like '%OPERADOR%'
	group by
			Nomina,Company,Area,Departamento,Puesto,Cvepue
	order by
			Company;
-- 	build params table
-- 	capacitaciones totales = cursos X total de operadores
-- 	porcentaje de cumplimiento = capacitaciones capturadas / capacitaciones totales X 100

	SELECT  
		count([ViewGetPayroll].[Cvetra]) as [ViewGetPayroll].[Cvetra],
		[ViewGetPayroll].[Departamento] AS [ViewGetPayroll__0] 
	FROM 
		[view_get_payrolls] AS [ViewGetPayroll]
	WHERE 
		[ViewGetPayroll].[Cvepue] IN ('000017', '000026', '000028') 
	AND 
		[ViewGetPayroll].[Puesto] LIKE '%OPERADOR%' 
	GROUP BY 
		[ViewGetPayroll].[Departamento]
