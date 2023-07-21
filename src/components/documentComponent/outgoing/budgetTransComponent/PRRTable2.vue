<template>
    <table>
                <thead>
                    <tr>
                        <th>transaction id no.</th>
                        <th>type of document</th>
                        <th>document / office</th>
                        <th>particulars</th>
                        <th>amount</th>
                        <th>bearer</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
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
    table-layout: fixed;
    width: 100%;
}
th{
    font-weight: 600;
    font-size: 12px;
    line-height: 24px;
    text-transform: uppercase;
}
tr{
    border-bottom: 1px solid gray;
}
td, th {
    padding: 6px 3px;
}
div{
    height: 32px;
    border-radius: 6px;
    border: 1px solid gray;
}
</style>