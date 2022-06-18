<template>
  <div class="container">
    <div class="row justify-content-center">

      <h2 class="my-4">Dashboard</h2>
      <a href="" type="button" class="btn btn-info">Generar nuevo plan</a>

    </div>
    <footer-component />
  </div>
</template>

<script>
export default {
  props: ['roleVal'],
  mounted () {
      // Do something useful with the data in the template
      console.dir(this.roleVal)
    }
};
</script>