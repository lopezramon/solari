<template>
<div> 
  <headerAccount/>
  <navaccount/>
  <div class="container mt-5 mb-5 ">
    <div class="table-responsive">
      <table class="table">
      <thead class="thead-dark">
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
          <td><img src="images/iconos/view.png" alt=""></td>
        </tr>
        <tr class="text-center">
          <td>123123123</td>
          <td>01/02/2011</td>
          <td class="text-danger">CANCELADA</td>
          <td><img src="images/iconos/view.png" alt=""></td>
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