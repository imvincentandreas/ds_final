var certificateInfo = new Vue({
  el: '#certificateInfo',
  data: {
    certificates: [],
    certification: {}
  },
  methods: {
    fetchCertificates() {
      fetch('api/certificates/viewcertificates.php')
      .then(response => response.json())
      .then(json => { certificateInfo.certificates = json })
    },

    handleDeleteCertificateForm() {
      fetch('api/certificates/deletecertification.php', {
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
          certificationID: ""
        }
      }
  },
  created() {
    this.fetchCertificates();
  }
});

function success() {
  alert("Certification deleted successfully, redirecting to view certifications page");
  window.location.href = "viewcertificates.html";
}
