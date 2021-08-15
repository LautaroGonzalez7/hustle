import ApiClient from "../apiClient";
import Response from "../Response";
import ComplementAdapter from "../../adapters/ComplementAdapter";

export default class ComplementApiClient {
    private client: ApiClient = new ApiClient();
    private adapt: ComplementAdapter = new ComplementAdapter();

    public async create(complement: any): Promise<Response<any> | any> {
        const response = await this.client.post(`/complement`, complement);
        return this.adapt.createAdapt(response);
    }

    public async update(complement: any): Promise<Response<any> | any> {
        const response = await this.client.put(`/complement/${complement.id}`, complement);
        return this.adapt.updateAdapt(response);
    }

    public async get(id: number): Promise<Response<any> | any> {
        const response = await this.client.get(`/complement/${id}`);
        return this.adapt.get(response);
    }

    public async getAll(): Promise<Response<any> | any> {
        const response = await this.client.get(`/complement`);
        return this.adapt.getAllAdapt(response);
    }

    public async addImages(complementId: number, images: any): Promise<Response<any> | any> {
        const response = await this.client.post(`/complement/${complementId}/images`, images, {'Content-Type': 'multipart/form-data'});
        return this.adapt.addImageAdapt(response);
    }

}
