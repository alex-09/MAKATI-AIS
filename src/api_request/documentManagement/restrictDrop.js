import axios from "axios";

export default function RestrictAPI() {
    return axios.get('ReceiveCommunication/listCA').then(response => {
        const restrictOptions = response.data.restrcit;
        return restrictOptions // Return the options data
    }).catch(error => {
        console.log(error);
        return []; // Return an empty array if there is an error
    });
}