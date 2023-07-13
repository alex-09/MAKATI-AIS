import axios from "axios";

export default function ActionAPI() {
    return axios.get('ReceiveCommunication/listCA').then(response => {
        const actionOptions = response.data.action;
        return actionOptions // Return the options data
    }).catch(error => {
        console.log(error);
        return []; // Return an empty array if there is an error
    });
}