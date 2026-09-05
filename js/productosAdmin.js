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


  



