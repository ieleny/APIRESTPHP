# APIRESTPHP
Api rest feito em PHP nativo 

Link Localhost: http://localhost/APIRESTPHP/Service/updateAgenda
</br>
Link Nuvem: http://agendacontato.atspace.cc/APIRESTPHP/Service/updateAgenda
Parametros:
	- id_agenda
	- nome
	- endereco
	- nascimento
	- telefone 

Deletar a Agenda:
    Method: DELETE
    Link Localhost: http://localhost/APIRESTPHP/Service/delete
    Link Nuvem: http://agendacontato.atspace.cc/APIRESTPHP/Service/delete
    Parametros:
            - id_agenda     

Inserir o Email:
    Method: POST
    Link Localhost: http://localhost/APIRESTPHP/Service/insertEmail
    Link Nuvem: http://agendacontato.atspace.cc/APIRESTPHP/Service/insertEmail
    Parametros:
            - id_agenda
            - email

Atualizar o Email:
    Method: PUT
    Link Localhost: http://localhost/APIRESTPHP/Service/updateEmail
    Link Nuvem: http://agendacontato.atspace.cc/APIRESTPHP/Service/updateEmail
    Parametros:
            - id_email
            - email

Buscar o Email pelo o Email:
    Method: POST
    Link Localhost: http://localhost/APIRESTPHP/Service/buscarEmail
    Link Nuvem:  http://agendacontato.atspace.cc/APIRESTPHP/Service/buscarEmail
    Parametros:
            - email
    
