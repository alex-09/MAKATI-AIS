<template>

</template>
<script>
export default {
  data() {
    return {
      expenses: [
        {
          account_code: "",
          account_name: "",
          amount: "",
        },
      ],
    };
  },
  methods: {
    addExpense() {
      this.expenses.push({
        account_code: "",
        account_name: "",
        amount: "",
      });
    },
  },
};
</script>
<style scoped>
td,
th {
  width: 250px;
  border-bottom: 1px solid #3a35418a;
  text-align: center;

  padding-top: 6px;
  padding-bottom: 6px;
}
</style>
