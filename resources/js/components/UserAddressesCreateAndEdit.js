Vue.component('user-addresses-create-and-edit', {
  data() {
    return {
      province: '',
      city: '',
      district: '',
    }
  },
  methods: {
    onDistrictChanged(val) {
      if (val.length === 2) {
        this.city = val[0];
        this.district = val[1];
      }
    }
  }
});