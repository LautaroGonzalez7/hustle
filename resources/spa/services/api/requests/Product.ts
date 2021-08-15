import ApiClient from "../apiClient";
import Response from "../Response";
import ProductAdapter from "../../adapters/ProductAdapter";

export default class ProductApiClient {
    private client: ApiClient = new ApiClient();
    private adapt: ProductAdapter = new ProductAdapter();

    public async create(product: any): Promise<Response<any> | any> {
        const response = await this.client.post(`/product`, product);
        return this.adapt.createAdapt(response);
    }

    public async update(product: any): Promise<Response<any> | any> {
        const response = await this.client.put(`/product/${product.id}`, product);
        return this.adapt.updateAdapt(response);
    }

    public async get(id: number): Promise<Response<any> | any> {
        const response = await this.client.get(`/product/${id}`);
        return this.adapt.get(response);
    }

    public async getAll(): Promise<Response<any> | any> {
        const response = await this.client.get(`/product`);
        return this.adapt.getAllAdapt(response);
    }

    public async addImages(productId: number, images: any): Promise<Response<any> | any> {
        const response = await this.client.post(`/product/${productId}/images`, images, {'Content-Type': 'multipart/form-data'});
        return this.adapt.addImageAdapt(response);
    }

}
