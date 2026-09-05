/*---------------------------------Ver lista de productos---------------------------------*/

document.addEventListener('DOMContentLoaded', () => {
  const contenedorTabla = document.getElementById('table-products');

  fetch('../base de datos/productos.json').then(response => {
      if (!response.ok) throw new Error('No se pudo cargar el JSON');
      return response.json();
    })
    .then(productos => {
      contenedorTabla.innerHTML = '';
      productos.forEach(producto => {
        const fila = document.createElement('tr');
        fila.innerHTML = `
          <th scope="row">${producto.id}</th>
          <td>${producto.titulo}</td>
          <td>$${producto.precio.toLocaleString()}</td>
          <td><img src="../${producto.imagen}" alt="${producto.titulo}" width="50"></td>
        `;
        contenedorTabla.appendChild(fila);
      });
    })
    .catch(error => console.error('Error:', error));
});


/*---------------------------------Agregar nuevos productos---------------------------------*/


let productos = [];

async function cargarProductos() {
  const productosRegistrados = localStorage.getItem('productos');

  if(productosRegistrados){
    productos = JSON.parse(productosRegistrados)
  }else{
    try {
      const respuesta = await fetch('productos.json')
      productos = await respuesta.json();
    } catch (error) {
      console.error('No se pudo cargar el archivo JSON')
    }
  }
}

function guardarEnMemoria(){
  localStorage.setItem('productos', JSON.stringify(productos));
}

function registrarProductos(nuevoProducto){
  const secuencia = productos.map(p => parseInt(p.id.replace('PR', ''), 10));
  const numeroMayor = Math.max(...secuencia);
  const nuevaSecuencia = numeroMayor + 1
  const id = `PR${nuevaSecuencia.toString().padStart(3, '0')}`

  const productoCargar = {
    id: id,
    titulo: nuevoProducto.titulo,
    precio: Number(nuevoProducto.precio),
    imagen: nuevoProducto.imagen || "img/productos"
  }

  productos.push(productoCargar)
  guardarEnMemoria();

  cargarProductos();
}

/*---------------------------------Agregar nuevos productos (Cuadro de dialogo)---------------------------------*/

const botonAbrir = document.getElementById('ventana-ingreso-productos');
const cuadro = document.getElementById('cuadro-ingreso-productos');
const botonCerrar = document.getElementById('btn-cerrar-cuadro');
const formulario = document.getElementById('forma-ingreso-productos');

botonAbrir.addEventListener('click', () => {
  cuadro.showModal();
});

botonCerrar.addEventListener('click', () => {
  cuadro.close(); 
  formulario.reset();
});

formulario.addEventListener('submit', (e) => {
  e.preventDefault();

  const nuevoProducto = {
    titulo: document.getElementById('ingreso-nombre').value,
    precio: document.getElementById('ingreso-precio').value,
    imagen: document.getElementById('ingreso-imagen').value
  };

  registrarProductos(nuevoProducto);
  formulario.reset();
  cuadro.close();
  
});