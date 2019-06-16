<template>
  <div>
    <div class="mt-4 float-right">
      <button class="text-center btn" style="font-size:20px;" v-on:click="removeDraft">
        <i class="fas fa-trash"></i>
      </button>
      <button class="text-center btn" style="font-size:20px;" v-on:click="saveDraft">
        <i class="far fa-save"></i>
      </button>
      <a
        :href="'/create?title=' +this.title+'&isi='+this.text "
        style="font-size:20px;"
        class="btn"
      >
        <i class="fas fa-arrow-right"></i>
      </a>
    </div>
    <input type="text" v-model="title" class="mt-4 title" placeholder="Title">

    <hr>
    <medium-editor
      style="outline: none;"
      :text="text"
      v-on:edit="processEditOperation"
      :options="options"
      custom-tag="div"
    ></medium-editor>
  </div>
</template>

<script>
import editor from "vue2-medium-editor";

var options = {
  toolbar: {
    allowMultiParagraphSelection: true,
    buttons: [
      "bold",
      "italic",
      "underline",
      "h1",
      "h3",
      "justifyLeft",
      "justifyCenter",
      "justifyRight",
      "quote",
      "anchor",
      "image",
      "html",
      "removeFormat"
    ],
    diffLeft: 0,
    diffTop: -10,
    firstButtonClass: "medium-editor-button-first",
    lastButtonClass: "medium-editor-button-last",
    relativeContainer: null,
    standardizeSelectionStart: false,
    static: false,
    align: "center",
    sticky: false,
    updateOnEmptySelection: false
  }
};
export default {
  data() {
    return {
      text: "",
      title: null,
      options: options
    };
  },
  mounted() {
    axios.get("/api/cekDraft").then(response => {
      var data = response.data;
      console.log(data);
      if (response.data.isi != null) {
        this.text = response.data.isi;
        this.title = response.data.title;
      } else {
      }
    });

    // axios.get("/api/cekDraft").then(function(data) {
    //   var tes = data.data.isi;
    //   console.log(this.text);
    //   this.title = "data.data.isi";
    // });
  },
  components: {
    "medium-editor": editor
  },
  methods: {
    removeDraft: function() {
      axios.get("/removeDraft").then(function(data) {
        console.log(data);
      });
      this.title = null;
      this.text = "";
    },
    processEditOperation: function(operation) {
      this.text = operation.api.origElements.innerHTML;
    },
    saveDraft: function() {
      axios
        .post("/draft", {
          title: this.title,
          isi: this.text
        })
        .then(function() {
          console.log("tes12313");
        });
    }
  }
};
</script>

      // axios
      //   .get("/draft?title=" + this.title + "&isi=" + this.text)
      //   .then(console.log("/draft?title=" + this.title + "&isi" + this.text));
      // this.like = false;

