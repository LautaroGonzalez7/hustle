import {AxiosResponse} from "axios";
/**
 * Para no depender de Axios tipeo nuestra propia response.
 */
export default class Response<T> {
    public data: T;
    public status: number;
    public headers: any;

    constructor(response: AxiosResponse) {
        this.data = response.data;
        this.status = response.status;
        this.headers = response.headers;
    }
}
