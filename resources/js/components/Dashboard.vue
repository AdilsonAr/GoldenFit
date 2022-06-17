<template>
  <div class="container">
    <div class="row justify-content-center">
      
      <div v-if="role == 'user'">
          <h2>Dashboard de usuario</h2>
          <a type="button" class="btn btn-info">Generar nuevo plan</a>
      </div>
      <div v-if="role == 'admin'">
          <h2>Dashboard de administrador</h2>
      </div>
    </div>
    <footer-component />
  </div>
</template>