var certificateInfo = new Vue({
  el: '#certificateInfo',
  data: {
    certificates: []
  },
  methods: {
    fetchCertificates() {
      fetch('api/certificates/viewcertificates.php')
      .then(response => response.json())
      .then(json => { certificateInfo.certificates = json })
    }
  },
  created() {
    this.fetchCertificates();
  }
});
