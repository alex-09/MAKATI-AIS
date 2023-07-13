import axios from "axios";

export default function ReplyToAPI() {
    return axios.get('ReceiveCommunication/listCA').then(response => {
        const replyOptions = response.data.list;
        console.log('hi', replyOptions);
        return replyOptions // Return the options data
    }).catch(error => {
        console.log(error);
        return []; // Return an empty array if there is an error
    });
}