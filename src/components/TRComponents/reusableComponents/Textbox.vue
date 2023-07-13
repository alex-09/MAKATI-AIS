<template>
  <input
    type="text"
    class="bg-[initial] text-sm border-[1px] border-[#3a354147] flex items-center cursor-default rounded-md w-full px-3 h-full focus:ring-0 focus:outline-none focus:border-[#3a354147] py-[auto]"
    :value="value"
    @input="$emit('input', $event.target.value)"
  />
</template>

<script>
export default {
  props: {
    value: String, // Declare a prop called value
  },
};
</script>

<style scoped>
::placeholder {
  /* Chrome, Firefox, Opera, Safari 10.1+ */
  color: #a1a2a3;
  opacity: 1; /* Firefox */
}

:-ms-input-placeholder {
  /* Internet Explorer 10-11 */
  color: #a1a2a3;
}

::-ms-input-placeholder {
  /* Microsoft Edge */
  color: #a1a2a3;
}
</style>
