<template>
    <table>
                <thead>
                    <tr>
                        <th><input type="checkbox"></th>
                        <th>date</th>
                        <th>time</th>
                        <th>transaction no.</th>
                        <th>processing slip no.</th>
                        <th>department / office</th>
                        <th>particulars</th>
                        <th>amount</th>
                    </tr>
                    
                </thead>
                <tbody>
                    <tr>
                        <td><input type="checkbox"></td>
                        <td><div></div></td>
                        <td><div></div></td>
                        <td><div></div></td>
                        <td><div></div></td>
                        <td><div></div></td>
                        <td><div></div></td>
                        <td><div></div></td>
                    </tr>
                    
                </tbody>
            </table>
</template>
<style scoped>
table{
    width: 100%;
    table-layout: auto;
}
th{

    font-weight: 600;
    font-size: 12px;
    line-height: 24px;
    align-items: center;
    text-transform: uppercase;
}
tr{
    border-bottom: 1px solid;
    
}
td, th{
    padding: 6px 3px;
    align-items: center;
    justify-content: center;
    text-align: center;
}
div{
    height: 32px;
    border: 1px solid grey;
    border-radius: 6px;
}
</style>