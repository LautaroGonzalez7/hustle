declare module '*.vue' {
    import Vue from 'vue'
    export default Vue
}

type IResponse = {
    data: any;
    status: number;
    headers: any;
}

type IUser = {
    id: number;
    email: string;
    password?: string;
    name: string;
    position: string;
    company: string;
    phone: string;
    image?: string;
}

type ISearchFilter = {
    position?: string;
    skillIds?: Array<number>;
    countryIds: Array<number>;
    regionId?: number | null;
    minSalary?: number;
    maxSalary?: number;
    isRemote?: boolean;
}

type ISearch = {
    id: number;
    position: string;
    skills: Array<ISkill>;
    country_id: number;
    region_id?: number | null;
    min_salary: number;
    max_salary: number;
    batches: Array<any> | undefined;
    candidates: Array<ICandidate> | undefined;
    is_manual: boolean;
    state: string;
    user: IUser;
    user_id?: number;
    presentedCandidates?: number;
}

type ICandidate = {
    answered: boolean;
    batch: number;
    contacted: boolean;
    created_at: string;
    deleted_at: string | null;
    feedback_message: string | null;
    has_good_feedback: number | boolean | null;
    recruiter_feedback_message: string | null;
    hired: boolean;
    id: number;
    profile: any;
    profile_id: number;
    score: number;
    search_id: number;
    state: string;
    updated_at: string;
}

type ISkill = {
    id: number;
    name: string;
    slug: string;
    synonyms: string;
    position: any;
    frontendPosition: any;
    backendPosition: any;
}

type IPosition = {
    id: number;
    name: string;
}

type IRegion = {
    id: number;
    english_name: string;
    spanish_name: string;
    country_id: number;
}

type ICountry = {
    id: number;
    name: string;
}
