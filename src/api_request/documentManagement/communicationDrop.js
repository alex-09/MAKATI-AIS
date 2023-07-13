import axios from "axios";

export default function CommAPI() {
    return axios.get('ReceiveCommunication/commtype').then(response => {
        const commOptions = response.data.list;
        return commOptions // Return the options data
    }).catch(error => {
        console.log(error);
        return []; // Return an empty array if there is an error
    });
}