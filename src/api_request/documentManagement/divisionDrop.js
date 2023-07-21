import axios from "axios";

export default function DivisionAPI() {
    return axios.get('ReceiveCommunication/listCA').then(response => {
        const searchOptions = response.data.division;
        const divisionOptions = response.data.division;
        console.log(divisionOptions);
        return divisionOptions, searchOptions  // Return the options data
    }).catch(error => {
        console.log(error);
        return []; // Return an empty array if there is an error
    });
}