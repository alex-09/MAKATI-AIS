<template>
    <div class="min-h-[400px] max-h-[400px] overflow-auto bg-white border-2 border-[#05C64B] border-solid">
        <table>
            <thead>
                <tr>
                    <th>
                        <div>
                            <div></div>
                            <span>DATE</span>
                        </div>
                    </th>
                    <th>TIME</th>
                    <th>PARTICULARS</th>
                    <th>USER</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="i in 1" :key="i">
                    
                    <td>
                        <div>
                            <input type="checkbox">
                            <span>AUTOFILL</span>
                        </div>
                    </td>
                    <td>AUTOFILL</td>
                    <td>AUTOFILL</td>
                    <td>AUTOFILL</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<style scoped>
table{
    min-width: 100%;
    table-layout: auto;
}
th{
    font-weight: 600;
    font-size: 12px;
    line-height: 24px;
    align-items: center;
    padding: 6px 4px;
}
td{
    font-weight: 600;
    font-size: 10px;
    line-height: 24px;
    text-align: center;
    padding: 6px 4px;
    
}
td, th{
    border-bottom: 1px solid gray;
}
tr>:nth-child(1)>div{
    align-items: center;
    display: flex;
    text-align: center;
    gap: 12px;
    padding-left: 16px;
    height: 32px;
}
/* tr>:nth-child(1)>div>span{
    flex-grow: 1;
} */
/* table cells width */
tr>:nth-child(1){
    width: 172px;

}
tr>:nth-child(2){
    width: 160px;
}
tr>:nth-child(3),
tr>:nth-child(4){
    width: 300px;
}
</style>