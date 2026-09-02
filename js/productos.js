// Datos de productos

const productos = {
    'rtx5060ti': {
      titulo: 'Nvidia Geforce RTX 5060ti',
      precio: 429990,
      imagen: 'img/productos/gpu_image_nvidia_rtx5060.png'
    },
    'rtx4070': {
      titulo: 'Nvidia Geforce RTX 4070',
      precio: 390000,
      imagen: 'img/productos/gpu_image_nvidia_rtx4070.webp'
    },
    '9060xt': {
      titulo: 'AMD Radeon 9060xt',
      precio: 400000,
      imagen: 'img/productos/gpu_image_amd_9060xt.webp'
    },

    'odysseyG3': {
      titulo: 'Monitor Samsung Odyssey G3',
      precio: 189990,
      imagen: 'img/productos/monitor_image_samsung_odyssey_27.avif'
    },

    'lgultragear': {
      titulo: 'Monitor LG UltraGear',
      precio: 211990,
      imagen: 'img/productos/monitor_image_lg_ultragear_27.avif'
    },

    'acer180hz': {
      titulo: 'Monitor Acer',
      precio: 189990,
      imagen: 'img/productos/monitor_image_acer_curvo_31.webp'
    },

    'ryzen7': {
      titulo: 'AMD Ryzen 7',
      precio: 319990,
      imagen: 'img/productos/cpu_image_amd_ryzen7_5700x.jpg'
    },

    'ryzen9': {
      titulo: 'AMD Ryzen 9',
      precio: 429990,
      imagen: 'img/productos/cpu_image_amd_ryzen9_5950x.jpg'
    },

    'i59400f': {
      titulo: 'Intel core I5-9400f',
      precio: 239990,
      imagen: 'img/productos/cpu_image_intel_i5_9400f.webp'
    }
  };

  
const urlParams = new URLSearchParams(window.location.search);
const idProducto = urlParams.get('id');

const productoActual = productos[idProducto] || productos['rtx5060ti'];


document.querySelector('.card_productos h1').innerText = productoActual.titulo;
document.querySelector('.card_productos_img').src = productoActual.imagen;

var precioProducto = document.getElementById('precioProducto');
precioProducto.innerText = productoActual.precio;

//Calculo IVA y precios

var precioProducto = document.getElementById('precioProducto');
var precioIVA = document.getElementById('precioIVA');
var precioTotal = document.getElementById('precioTotal');

var precio = Number(precioProducto.innerText);

var totalIVA = Math.round(precio * 0.19);
var total = Math.round(precio * 1.19);

precioProducto.innerText = precio.toLocaleString('es-CL');
precioIVA.innerText = totalIVA.toLocaleString('es-CL');
precioTotal.innerText = total.toLocaleString('es-CL');