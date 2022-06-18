<template>
  <graph-pie
    :width="500"
    :height="500"
    :padding-top="100"
    :padding-bottom="100"
    :padding-left="100"
    :padding-right="100"
    :values="valuesVals"
    :names="namesVals"
    :active-index="[0, 2]"
    :active-event="'click'"
    :show-text-type="'outside'"
  >
    <legends :names="names"></legends>
    <tooltip :names="names"></tooltip>
  </graph-pie>
</template>


<script>
export default {
  data: () => {
    return {
      valuesVals: [0, 0],
      namesVals:[Masculino, Femenino]
    };
  },

  mounted() {
    this.initialize();
  },

  methods: {
    async initialize() {
      let res = await axios.get("api/graphic-genders");
      this.valuesVals[0] = res.data.male;
      this.valuesVals[1] = res.data.female;
    },
  },
};
</script>