import axios from "axios";

export default function DeptAPI() {
    return axios.get('Dropdowns/department').then(response => {
        const deptOptions = response.data.department;
        const bearerDeptOptions = response.data.department;
        const searchContracts = response.data.department;
        const deptLists = response.data.department;
        console.log(deptLists)
        return deptOptions, bearerDeptOptions, searchContracts, deptLists; // Return the options data
    }).catch(error => {
        console.log(error);
        return []; // Return an empty array if there is an error
    });
}
