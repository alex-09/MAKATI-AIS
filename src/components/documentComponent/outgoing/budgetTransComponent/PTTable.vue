<template>
    <table>
                <thead>
                    <tr>
                        <th><input type="checkbox"></th>
                        <th>transaction no.</th>
                        <th>Registered Date</th>
                        <th>Name of department/office</th>
                        <th>amount</th>
                        <th>processing slip</th>
                        <th>name of bearer</th>
                    </tr>
                    
                </thead>
                <tbody>
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>0003213-213213</td>
                        <td>01/01/2023</td>
                        <td>Accounting Department</td>
                        <td>130,000.00</td>
                        <td>02-2022-06-23231</td>
                        <td>Juan Dela Cruz</td>
                    </tr>
                    
                </tbody>
            </table>
</template>
<style scoped>
table{
    
    table-layout: fixed;
    width: 100%;
}
th, td{
    border-bottom: 1px solid grey;
    padding-left: 16px;
    padding-top: 6px;
    padding-bottom: 6px;
}
th{
    
    text-align: start;
    text-transform: uppercase;
    font-weight: 600;
    font-size: 12px;
    line-height: 24px;
}
td{
    font-weight: 400;
    font-size: 14px;
    line-height: 21px;
}
tr > :nth-child(1){
    text-align: center;
}
</style>
