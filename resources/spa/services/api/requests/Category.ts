import ApiClient from "../apiClient";
import Response from "../Response";
import CategoryAdapter from "../../adapters/CategoryAdapter";

export default class CategoryApiClient {
    private client: ApiClient = new ApiClient();
    private adapt: CategoryAdapter = new CategoryAdapter();

    public async create(category: any): Promise<Response<any> | any> {
        const response = await this.client.post(`/category`, category);
        return this.adapt.createAdapt(response);
    }

    public async update(category: any): Promise<Response<any> | any> {
        const response = await this.client.put(`/category/${category.id}`, category);
        return this.adapt.updateAdapt(response);
    }

    public async get(id: number): Promise<Response<any> | any> {
        const response = await this.client.get(`/category/${id}`);
        return this.adapt.get(response);
    }

    public async getAll(): Promise<Response<any> | any> {
        const response = await this.client.get(`/category`);
        return this.adapt.getAllAdapt(response);
    }

}
