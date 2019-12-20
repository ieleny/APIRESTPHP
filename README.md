# APIRESTPHP
Api rest feito em PHP nativo 

Link Localhost: http://localhost/API/Service/updateAgenda
Link Nuvem: http://agendacontato.atspace.cc/API/Service/updateAgenda
Parametros:
	- id_agenda
	- nome
	- endereco
	- nascimento
	- telefone 

Deletar a Agenda:
    Method: DELETE
    Link Localhost: http://localhost/API/Service/delete
    Link Nuvem: http://agendacontato.atspace.cc/API/Service/delete
    Parametros:
            - id_agenda     

Inserir o Email:
    Method: POST
    Link Localhost: http://localhost/API/Service/insertEmail
    Link Nuvem: http://agendacontato.atspace.cc/API/Service/insertEmail
    Parametros:
            - id_agenda
            - email

Atualizar o Email:
    Method: PUT
    Link Localhost: http://localhost/API/Service/updateEmail
    Link Nuvem: http://agendacontato.atspace.cc/API/Service/updateEmail
    Parametros:
            - id_email
            - email

Buscar o Email pelo o Email:
    Method: POST
    Link Localhost: http://localhost/API/Service/buscarEmail
    Link Nuvem:  http://agendacontato.atspace.cc/API/Service/buscarEmail
    Parametros:
            - email
    
