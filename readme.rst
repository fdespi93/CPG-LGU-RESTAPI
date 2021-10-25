###################
What is CPG - LGU rest api
###################

Cebu Provincial Government - Local Government Unit REST API generates list of District, Municipality/City, Barangay, Sitio for Region 7

***************
fdespi.10252021
***************

***************
CPG - LGU API
***************
***getLguDetail***
-->Get the LGU detail
url:  '/cpg-api/pgcmaster/getLguDetail/'+lgucode,
method: 'GET',
headers: {
	'Client-Service': client_service_value_here,
	'Auth-Key': auth_key_value_here
}

***************
getLguList
***************
-->Get all LGU list
url:  '/cpg-api/pgcmaster/getLguList',
method: 'GET',
headers: {
	'Client-Service': client_service_value_here,
	'Auth-Key': auth_key_value_here
}

***************
getLguByDistrict
***************
-->Get LGU list by DISTRICT
url:  '/cpg-api/pgcmaster/getLguByDistrict',
method: 'GET',
headers: {
	'Client-Service': client_service_value_here,
	'Auth-Key': auth_key_value_here
},
params: {
	distid: intger_value_here
}

***************
getBrgyDetail
***************
-->Get the Brgy detail
url:  '/cpg-api/pgcmaster/getBrgyDetail/'+brgycode,
method: 'GET',
headers: {
	'Client-Service': client_service_value_here,
	'Auth-Key': auth_key_value_here
}

***************
getBrgyList
***************
-->Get all Brgy list
url:  '/cpg-api/pgcmaster/getBrgyList',
method: 'GET',
headers: {
	'Client-Service': client_service_value_here,
	'Auth-Key': auth_key_value_here
}

***************
getBrgyByLgu
***************
-->Get Brgy list by Lgu
url:  '/cpg-api/pgcmaster/getBrgyByLgu',
method: 'GET',
headers: {
	'Client-Service': client_service_value_here,
	'Auth-Key': auth_key_value_here
},
params: {
	lguid: intger_value_here
}
