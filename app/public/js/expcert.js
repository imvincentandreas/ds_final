var memberCertificate = new Vue({
  el: '#memberCertificate',
  data: {
    memberCertificate: []
  },
  methods: {
    fetchMemberCertificates() {
      fetch('api/records/viewexpcert.php')
      .then(response => response.json())
      .then(json => { memberCertificate.memberCertificate = json })
    }
  },
  created() {
    this.fetchMemberCertificates();
  }
});
