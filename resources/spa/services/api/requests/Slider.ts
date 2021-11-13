import ApiClient from "../apiClient";
import Response from "../Response";
import SliderAdapter from "../../adapters/SliderAdapter";

export default class SliderApiClient {
    private client: ApiClient = new ApiClient();
    private adapt: SliderAdapter = new SliderAdapter();

    public async create(slider: any): Promise<Response<any> | any> {
        const response = await this.client.post(`/slider`, slider);
        return this.adapt.createAdapt(response);
    }

    public async update(slider: any): Promise<Response<any> | any> {
        const response = await this.client.put(`/slider/${slider.id}`, slider);
        return this.adapt.updateAdapt(response);
    }

    public async get(id: number): Promise<Response<any> | any> {
        const response = await this.client.get(`/slider/${id}`);
        return this.adapt.get(response);
    }

    public async getAll(): Promise<Response<any> | any> {
        const response = await this.client.get(`/slider`);
        return this.adapt.getAllAdapt(response);
    }

    public async addImages(sliderId: number, images: any): Promise<Response<any> | any> {
        const response = await this.client.post(`/slider/${sliderId}/images`, images, {'Content-Type': 'multipart/form-data'});
        return this.adapt.addImageAdapt(response);
    }

}
