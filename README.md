# Repositorio para subir ejercicios de programación

El propósito de este repositorio es proporcionar un espacio donde pueda subir y compartir los ejercicios de programación que he realizado. Además de colaborar con mis compañeros y cualquier otra persona interesada en la programación, brindando la oportunidad de reutilizar y aprender del código que he desarrollado.

## Comandos básicos de Git

Lista de comandos básicos de Git que se pueden ejecutar desde cualquier terminal.

#### Git Clone

    git clone [URL del repositorio]

 Clona un repositorio existente en tu máquina local a partir de una URL proporcionada.
 Ejemplo con el URL de este repositorio

    git clone https://github.com/klosther/programacion01.git

#### Git Add

    git add [nombre de archivos]

 Agrega archivos al área de preparación (staging area) para ser incluidos en el siguiente commit.
 Generalmente el git add es utilizado con un "." lo cual agrega todas las carpetas y archivos. Solo subirá los archivos modificados

    git add .

#### Git Commit
    
    git commit -m "mensaje"

Crea un nuevo commit con los cambios del área de preparación y asocia un mensaje descriptivo.

#### Git Push

    git push

Los cambios previamente subidos al commit son subidos al repositorio.

#### Git Pull

    git pull

Descarga todos los archivos del repositorio y los fusiona con tus archivos locales

## Funcionalidades de HTML

En este apartado voy a ir dejando cosas que me parecieron interesantes de HTML y que creo pueden ser muy útiles

#### Tipos de inputs

Input text permite ingresar texto

    <input type="text">

Input number solo permite ingresar números 

    <input type="number">

#### Condiciones para los inputs

Para que el input tenga un mínimo de caracteres podemos usar 

    minlength="8"

Para que el input tenga un maximo de caracteres podemos usar

    maxlength="20"

Para que solo permite letras podemos usar 

    pattern="[A-Za-z]+"

Para que no se permita enviar el formulario vacío podemos usar

    required



