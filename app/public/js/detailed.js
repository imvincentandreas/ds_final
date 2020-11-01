var memberInfo = new Vue({
  el: '#memberInfo',
  data: {
    members: [],
    certificates: [],
    filter: {
      fn: ""
    }
  },
  methods: {
    fetchMembers() {
      fetch('api/members/viewmembers.php')
      .then(response => response.json())
      .then(json => { memberInfo.members = json })
    },
    fetchCertificates() {
      fetch('api/certificates/viewcertificates.php')
      .then(response => response.json())
      .then(json => { certificateInfo.certificates = json })
    }
  },
  created() {
    this.fetchMembers();
    this.fetchCertificates();
  }
});
