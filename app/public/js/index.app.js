var app = new Vue({
  el: '#triagePage',
  data: {
    memList: [],
    activemem: null,
    triageForm: {
      priority: null,
      symptoms: ''
    },
    newPtForm: {}
  },
  computed: {
    activePtName() {
      return this.activePt ? this.activePt.lastName + ', ' + this.activePt.firstName : ''
    },
    activePtDob() {
      return this.activePt ? this.activePt.dob : ''
    }
  },
  methods: {
    newmemData() {
      return {
        firstName: "",
        lastName: "",
        dob: "",
        sexAtBirth: ""
        //add and modify to match same as form
      }
    },
    handleNewPtForm( evt ){
      evt.preventDefault();  // Redundant w/ Vue's submit.prevent
      /*
      //TODO: Hook to API
      fetch( url, {
       method: "post",
       data: data
      })
      */

      console.log("Creating...!");
      console.log(this.newmemForm);

      this.memList.push(this.newmemForm);

      this.newmemForm = this.newPtData();
    },
    handleTriageForm( evt ) {
      console.log("Form submitted!");

      this.triageForm.pt = this.activePt;
      console.log(this.triageForm);

    }
  },
  created() {
    fetch("app/public/api/members/addmembers.php")
    .then( response => response.json() )
    .then( json => {
      this.memList = json;

      console.log(json)}
    );
    this.newmemForm = this.newmemData();
  }
})
