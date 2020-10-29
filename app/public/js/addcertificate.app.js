var insertCertificate = new Vue({
  el: '#insertCertificate',
  data: {
    certification: {}
  },
  methods: {
    handleNewCertificateForm() {
    fetch('api/certificates/addcertification.php', {
      method:'POST',
      body: JSON.stringify(this.certification),
      headers:{
        "Content-Type": "application/json; charset=utf-8"
      }
      })
      .then( response => response.text() )

      this.handleData();
    },

    handleData() {
      this.certification = {
        name: "",
        validity: ""
      }
    }
  },
  created() {
    this.handleData();
  }
});

function success() {
  alert("Certification added successfully, redirecting to view certifications page");
  window.location.href = "viewCertificates.html";
}
