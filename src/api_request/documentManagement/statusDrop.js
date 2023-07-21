import axios from "axios";

export default function StatusAPI() {
    return axios.get('ReceiveCommunication/listCA').then(response => {
        const statusOptions = response.data.status;
        return statusOptions // Return the options data
    }).catch(error => {
        console.log(error);
        return []; // Return an empty array if there is an error
    });
}