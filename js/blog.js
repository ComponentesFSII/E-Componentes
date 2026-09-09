const texto1 = "El mercado de hardware vuelve a enfrentar un periodo de incertidumbre.  Durante las últimas semanas, los precios de las tarjetas gráficas de la línea NVIDIA han experimentado un aumento drástico y acelerado en distribuidores globales, impulsado por una repentina escasez de componentes clave en la cadena de suministro."

const texto2 = "El debate entre Intel y AMD lleva décadas encendido, pero hoy la decisión es más táctica que nunca. La elección del procesador ideal depende directamente del uso principal del equipo, el presupuesto y los componentes que lo acompañarán en el ensamblado."

const contenedor1 = document.getElementById('contenedor-blog-1')
const contenedor2 = document.getElementById('contenedor-blog-2')

const parrafo1 = document.createElement("p")
const parrafo2 = document.createElement("p")

parrafo1.innerHTML = texto1;
parrafo2.innerHTML = texto2; 

contenedor1.appendChild(parrafo1)
contenedor2.appendChild(parrafo2)

