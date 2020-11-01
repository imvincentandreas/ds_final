var memberCertificate = new Vue({
  el: '#memberCertificate',
  data: {
    memberCertificate: [],
    memcert: [],
    members: [],
    filter: {
      fn: ''
    }
  },
  methods: {
    fetchMemberCertificates() {
      fetch('api/certificates/allmemcert.php')
      .then(response => response.json())
      .then(json => { memberCertificate.memberCertificate = json })
    },
    fetchCertificates() {
      fetch('api/certificates/memcert.php')
      .then(response => response.json())
      .then(json => { memberCertificate.memcert = json })
    },
    fetchMembers() {
      fetch('api/certificates/certmem.php')
      .then(response => response.json())
      .then(json => { memberCertificate.members = json })
    }
  },
  created() {
    this.fetchMemberCertificates();
    this.fetchCertificates();
    this.fetchMembers();
  }
});
