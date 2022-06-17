<template>
<div>
  <v-footer
    dark
    padless
    style="position: fixed; bottom: 0; width: 100%;"
  >
    <v-card
      class="flex"
      flat
      tile
    >

      <v-card-text class="py-2 white--text text-center">
        {{ new Date().getFullYear() }} — <strong>GoldenFit</strong>
      </v-card-text>
    </v-card>
  </v-footer>
  </div>
</template>