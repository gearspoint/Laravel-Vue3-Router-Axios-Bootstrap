import http from "../http-common";

class sharkDataService {
  getAll() {
    return http.get("/sharks");
  }

  get(id) {
    return http.get(`/sharks/${id}`);
  }

  create(data) {
    return http.post("/sharks", data);
  }

  update(id, data) {
    return http.put(`/sharks/${id}`, data);
  }

  delete(id) {
    return http.delete(`/sharks/${id}`);
  }

  deleteAll() {
    return http.delete(`/sharks`);
  }

  findByname(name) {
    return http.get(`/sharks?name=${name}`);
  }
}

export default new sharkDataService();
