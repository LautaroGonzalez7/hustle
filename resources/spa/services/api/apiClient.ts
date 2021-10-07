import Axios, {AxiosRequestConfig} from 'axios';
import Response from "./Response";

/**
 * Esta clase funcionaria como un adapter.
 */
export default class ApiClient {

    private baseUrl: string | undefined = process.env.MIX_API_CLIENT_DOMAIN;

    private config: AxiosRequestConfig = {
        baseURL: this.baseUrl,
        headers: {'Content-Type': 'application/json'}
    };

    public async get(path: string, params?: string | null | undefined): Promise<Response<any>> {
        return new Response<any>(
            await Axios.get(path, {...this.config, params}).catch(function (error) {
                return error.response;
            })
        );
    }

    public async post(path: string, payload: string | null, header: object | null = null): Promise<Response<any>> {
        // @ts-ignore
        this.config.headers = header ? header : this.config.headers;
        return new Response<any>(await Axios.post(path, payload, this.config).catch(function (error) {
            return error.response;
        }));
    }

    public async put(path: string, payload: object | string | null, header: object | null = null): Promise<Response<any>> {
        // @ts-ignore
        this.config.headers = header ? header : this.config.headers;
        return new Response<any>(await Axios.put(path, payload, this.config).catch(function (error) {
            return error.response;
        }));
    }

    public async patch(path: string, payload: object | null): Promise<Response<any>> {
        return new Response<any>(await Axios.patch(path, payload, this.config));
    }

    public async delete(path: string): Promise<Response<any>> {
        return new Response<any>(await Axios.delete(path, this.config));
    }
}
