import axios from "axios";

export default function showAPI() {
    return axios.get('coa/index').then(response => {
        const options = response.data.data;
        // console.log(options);
        return options; // Return the options data
    }).catch(error => {
        console.log(error);
        return []; // Return an empty array if there is an error
    });
  }
