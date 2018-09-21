<template>
<div> 
  <headerAccount/>
  <navaccount/>
  <div class="container mt-5 mb-5 ">
    <div class="table-responsive">
      <table class="table">
      <thead class="thead-dark">
<!-- INICIO MERGE ERICK BRANCH LARAVEL 
        <tr>
          <th scope="col">#</th>
          <th scope="col">First</th>
          <th scope="col">Last</th>
          <th scope="col">Handle</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Jacob</td>
          <td>Thornton</td>
          <td>@fat</td> 
FIN MERGE ERICK BRANCH LARAVEL -->
        <tr class="text-center">
          <th scope="col-6">N RESERVA</th>
          <th scope="col-6">FECHA</th>
          <th scope="col-6">STATUS</th>
          <th scope="col-6">ACTION</th>
        </tr>
      </thead>
      <tbody>
        <tr class="text-center">
          <td>123123123</td>
          <td>01/02/2011</td>
          <td>ACTIVO</td>
          <td><a href="/my-order-detail"><img src="images/iconos/view.png" alt=""></a></td>
        </tr>
        <tr class="text-center">
          <td>123123123</td>
          <td>01/02/2011</td>
          <td class="text-danger">CANCELADA</td>
          <td><a href="/my-order-detail"><img src="images/iconos/view.png" alt=""></a></td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Larry</td>
          <td>the Bird</td>
          <td>@twitter</td>
        </tr>
      </tbody>
    </table>
    </div>
  </div>
  <div class="d-none d-md-block alto" ></div>
</div>

</template>


<style scoped>
  .alto{
    height: 100px;
  }
</style>