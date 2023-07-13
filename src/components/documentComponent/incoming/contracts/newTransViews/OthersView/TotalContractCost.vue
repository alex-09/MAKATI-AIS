<template>
    <table>
        <tfoot>
            <tr>
                <td colspan="6"><div>TOTAL CONTRACT COST</div></td>
                <td><div>PHPXXXX.00</div></td>
            </tr>
        </tfoot>
    </table>
</template>
<script setup>
import { ref } from 'vue'
const tableRowCount = ref(5)
</script>
<style scoped>
table{
    table-layout: fixed;
    width: 100%;
    
}

td{
    padding: 6px 3px;
}
td > div {
    
    height: 32px;
    border: 1px solid gray;
    border-radius: 6px;
    display: flex;
    align-items: center;
    padding: 0px 17px;
}
</style>