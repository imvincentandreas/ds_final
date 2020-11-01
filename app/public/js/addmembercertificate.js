var insertMemberCertificate = new Vue({
  el: '#insertMemberCertificate',
  data: {
    newMemberCertificate: {}
  },
  methods: {
      handleAddMemCertificate() {
        fetch('api/members/addmembercertificate.php', {
          method:'POST',
          body: JSON.stringify(this.newMemberCertificate),
          headers:{
            "Content-Type": "application/json; charset=utf-8"
          }
          })
          .then( response => response.text())

          this.newData();
        },

      newData() {
        this.newMemberCertificate = {
          memberID: "",
          earn: "",
          certificationID: "",
          expiration: ""
        }
      }
  },
  created() {
    this.handleAddMemCertificate();
  }
});

function success() {
  alert("Certification added successfully, redirecting to member certifications page");
  window.location.href = "detailed.html";
}
