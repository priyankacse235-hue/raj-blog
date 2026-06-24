<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Template Builder</title>

  <!-- GrapesJS Core -->
  <link href="https://unpkg.com/grapesjs/dist/css/grapes.min.css" rel="stylesheet" />
  <script src="https://unpkg.com/grapesjs"></script>

  {{-- <link href="{{asset('js/grapesjs/css/grapes.min.css')}}" rel="stylesheet" />
  <script src="{{asset('js/grapesjs/grapesjs.min.js')}}"></script> --}}

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Roboto&family=Pacifico&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"> --}}
  {{-- <link rel="{{asset('js/grapesjs/all.min.css')}}"></link> --}}
<link rel="stylesheet" href="{{ asset('js/grapesjs/all.min.css') }}">
  <!-- Plugins -->
  <script src="https://unpkg.com/grapesjs-component-countdown"></script>
  <script src="https://unpkg.com/grapesjs-plugin-export"></script>
  <script src="https://unpkg.com/grapesjs-style-bg"></script>
  <script src="https://unpkg.com/grapesjs-blocks-bootstrap4"></script>
  <script src="https://unpkg.com/grapesjs-plugin-toolbox"></script>
  <script src="https://unpkg.com/grapesjs-style-gradient"></script>
  <script src="https://unpkg.com/grapesjs-blocks-basic"></script>


  
  <style>
    body, html { margin: 0; height: 100%; }
    #gjs { height: 100vh; }
    .gjs-block-label i,
    .gjs-block-label img {
      font-size: 24px;
      max-height: 24px;
      display: block;
      margin: auto;
    }
    #icon-search {
      padding: 5px;
      width: 100%;
      font-size: 14px;
      box-sizing: border-box;
      margin-bottom: 5px;
    }
    .gjs-block-category { padding-top: 10px; }
  </style>
</head>
<body>

  {{-- <button id="save-template" style="position:fixed;top:10px;right:10px;z-index:9999;">💾 Save</button> --}}
  <div id="gjs">

  </div>

  <script>
    function uploadImages() {
      const files = document.getElementById('uploadInput').files;
      const formData = new FormData();
      for (let i = 0; i < files.length; i++) {
        formData.append('images[]', files[i]);
      }

      fetch("{{url('admin/upload-user-gallery')}}", {
        method: 'POST',
        body: formData,
        headers: {
          'X-CSRF-TOKEN': '{{ csrf_token() }}' // if you're using Laravel
        }
      })
      .then(res => res.json())
      .then(res => {
        alert("Upload success!");
        fetchUserImages();
      })
      .catch(err => alert("Upload failed"));
    }

    function fetchUserImages() {
      fetch("{{ url('admin/get-user-gallery') }}")
        .then(res => res.json())
        .then(images => {
          const galleryDiv = document.getElementById('userGallery');
          galleryDiv.innerHTML = '';

          images.forEach(img => {
            // Create wrapper div
            const wrapper = document.createElement('div');
            wrapper.style = "display: flex; flex-direction: column; align-items: center; margin: 5px;";

            // Create image element
            const imageEl = document.createElement('img');
            imageEl.src = img.url;
            imageEl.style = "width: 100px; height: 100px; object-fit: cover; cursor: pointer; border: 1px solid #ccc;";
            imageEl.onclick = () => {
              const imageComponent = editor.DomComponents.addComponent({
                type: 'image',
                attributes: { src: img.url },
              });
              editor.Modal.close();
            };

            // Create Copy button
            const copyBtn = document.createElement('button');
            copyBtn.innerText = "Copy URL";
            copyBtn.style = "margin-top: 5px; padding: 2px 6px; font-size: 12px; cursor: pointer;";
            copyBtn.onclick = () => {
              navigator.clipboard.writeText(img.url).then(() => {
                copyBtn.innerText = "Copied!";
                setTimeout(() => copyBtn.innerText = "Copy URL", 1500);
              });
            };

            wrapper.appendChild(imageEl);
            wrapper.appendChild(copyBtn);
            galleryDiv.appendChild(wrapper);
          });
        });
    }

    // 🔹 Global refs for popup
    let selectedComponent = null;
    const popup = document.querySelector('.datetime-popup');
    const overlay = document.querySelector('.popup-overlay');
    const datetimeInput = document.getElementById('datetimePicker');
    const saveButton = document.getElementById('saveDatetime');

    function showPopup(component) {
      selectedComponent = component;
      overlay.classList.add('show');
      popup.classList.add('show');

      // Set default to today+7 days
      let defaultDate = new Date();
      defaultDate.setDate(defaultDate.getDate() + 7);
      defaultDate.setHours(12, 0, 0, 0);
      datetimeInput.value = defaultDate.toISOString().slice(0,16);
    }

    function hidePopup() {
      overlay.classList.remove('show');
      popup.classList.remove('show');
    }

    const editor = grapesjs.init({
      container: '#gjs',
      height: '100%',
      width: 'auto',
      fromElement: false,
      storageManager: false,

      canvas: {
        styles: [
          'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css'
        ],
        scripts: [
          'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js'
        ]
      },

      assetManager: {
        // If you want only base64 upload (no server)
        embedAsBase64: true,     // Enables upload from device directly as base64
        upload: false,           // Keep this false when using base64 only
        autoAdd: true,           // Automatically add uploaded image to asset manager
        uploadName: 'files',     // Input field name for file (used if backend enabled)
        openAssetsOnDrop: 1,     // Open asset manager on drop
        uploadText: 'Drop files here or click to upload',
        assets: [],              // Initial assets list
        credentials: false       // Only needed if you use authenticated backend
      },  

  

      styleManager: {
        sectors: [{
          name: 'Typography',
          open: true,
          buildProps: ['font-family', 'font-size', 'font-weight', 'letter-spacing', 'color', 'line-height', 'text-align'],
          properties: [{
            name: 'Font',
            property: 'font-family',
            list: [
              { value: "'Roboto', sans-serif", name: 'Roboto' },
              { value: "'Great Vibes', cursive", name: 'Great Vibes' },
              { value: "'Pacifico', cursive", name: 'Pacifico' },
              { value: 'Arial, sans-serif', name: 'Arial' },
              { value: 'Georgia, serif', name: 'Georgia' },
            ]
          }]
        }]
      },

      plugins: [
        'gjs-component-countdown',
        'gjs-plugin-export',
        'gjs-style-bg',
        'grapesjs-blocks-bootstrap4',
        'gjs-plugin-toolbox',
        'gjs-style-gradient',
        'gjs-blocks-basic'
      ],

      pluginsOpts: {
        'gjs-component-countdown': {},
        'gjs-plugin-export': {},
        'gjs-style-bg': {},
        'grapesjs-blocks-bootstrap4': {},
        'gjs-plugin-toolbox': {},
        'gjs-style-gradient': {},
        'gjs-blocks-basic': {}
      },
      deviceManager: {
        devices: [
          {
            name: 'Desktop',
            width: '', // Default
          },
          {
            name: 'Tablet',
            width: '768px',
            widthMedia: '992px',
          },
          {
            name: 'Mobile',
            width: '375px',
            widthMedia: '480px',
          }
        ]
      }
    });

    editor.setComponents(`{!! $template->html !!}`);
   
    editor.setStyle(`{!! $template->css !!}`);


    const bm = editor.BlockManager;

    editor.DomComponents.addType('image', {
      extend: 'image',
      model: {
        initialize() {
          const traits = this.get('traits') || [];

          // Only add the upload button once
          if (!traits.find(t => t.name === 'upload-btn')) {
            traits.push({
              type: 'button',
              name: 'upload-btn',
              text: 'Upload Image',
              full: true,
              command: 'open-assets',
            });

            this.set('traits', traits);
          }
        }
      }
    });

    editor.Panels.addButton('options', [{
      id: 'open-user-gallery',
      className: 'fa fa-image',
      command: 'open-user-gallery-modal',
      attributes: { title: 'User Gallery' },
    }]);

    editor.Commands.add('open-user-gallery-modal', {
      run(editor) {
        const modal = editor.Modal;
        const content = `
          <div style="padding: 10px;">
            <h4>User Gallery</h4>
            <input type="file" id="uploadInput" multiple><br><br>
            <button onclick="uploadImages()">Upload</button>
            <hr>
            <div id="userGallery" style="display: flex; flex-wrap: wrap; gap: 10px;"></div>
          </div>
        `;
        modal.setTitle('Your Gallery');
        modal.setContent(content);
        modal.open();

        // Fetch existing images
        fetchUserImages();
      }
    });

    // Command to open Asset Manager
    editor.Commands.add('open-assets', {
      run(editor) {
        const selected = editor.getSelected();
        if (!selected || !selected.set) return;

        editor.AssetManager.open({
          select(asset) {
            selected.set('src', asset.get('src'));
          }
        });
      }
    });

    editor.on('component:selected', () => {
      const openSmBtn = editor.Panels.getButton('views', 'open-sm');
      if (openSmBtn && !openSmBtn.get('active')) {
        openSmBtn.set('active', 1);
      }
    });


    // 1️⃣ Add Confetti Block
editor.BlockManager.add('confetti-block', {
  label: '🎉 Confetti',
  category: 'Effects',
  content: `
    <div data-gjs-type="confetti-wrapper"
         style="position:fixed; top:0; left:0; width:100%; height:100%; z-index:9999;">
      <canvas class="confetti" style="width:100%; height:100%; pointer-events:none;"></canvas>
      <div class="confetti-control" 
           style="position:absolute; top:10px; left:10px;
                  background:rgba(0,0,0,0.5); color:#fff; 
                  padding:4px 8px; font-size:12px; cursor:pointer;">
        🎉 Confetti
      </div>
    </div>
  `
});

// 2️⃣ Register Component Type
editor.DomComponents.addType('confetti-wrapper', {
  isComponent: el => el.getAttribute && el.getAttribute('data-gjs-type') === 'confetti-wrapper',

  model: {
    defaults: {
      droppable: false,
      resizable: false,
      attributes: { class: 'confetti-wrapper' },

      // Default Props
      'confetti-count': 120,
      'confetti-min-size': 3,
      'confetti-max-size': 8,
      'confetti-shape': 'circle',
      'confetti-colors': '#ff0a54,#ff477e,#ff7096,#ff85a1,#fbb1bd,#f9bec7',

      traits: [
        {
          type: 'range',
          label: 'Confetti Count',
          name: 'confetti-count',
          min: 50,
          max: 500,
          step: 10
        },
        {
          type: 'range',
          label: 'Min Size',
          name: 'confetti-min-size',
          min: 2,
          max: 20,
          step: 1
        },
        {
          type: 'range',
          label: 'Max Size',
          name: 'confetti-max-size',
          min: 5,
          max: 40,
          step: 1
        },
        {
          type: 'select',
          label: 'Shape',
          name: 'confetti-shape',
          options: [
            { id: 'circle', name: 'Circle' },
            { id: 'square', name: 'Square' }
          ]
        },
        {
          type: 'text',
          label: 'Colors (comma separated)',
          name: 'confetti-colors',
          placeholder: '#ff0000,#00ff00,#0000ff'
        }
      ],

      script: function () {
        const canvas = this.querySelector('.confetti');
        const ctx = canvas.getContext('2d');
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        // Read trait values
        let confettiCount = parseInt(this.getAttribute('confetti-count')) || 120;
        let minSize = parseInt(this.getAttribute('confetti-min-size')) || 3;
        let maxSize = parseInt(this.getAttribute('confetti-max-size')) || 8;
        let shape = this.getAttribute('confetti-shape') || 'circle';
        let colors = (this.getAttribute('confetti-colors') || '#ff0a54,#ff477e,#ff7096')
                       .split(',').map(c => c.trim());

        let confetti = [];

        function createConfetti() {
          return {
            x: Math.random() * canvas.width,
            y: Math.random() * canvas.height - canvas.height,
            r: Math.random() * (maxSize - minSize) + minSize,
            d: Math.random() * 0.5 + 0.5,
            color: colors[Math.floor(Math.random() * colors.length)]
          };
        }

        for (let i = 0; i < confettiCount; i++) confetti.push(createConfetti());

        function draw() {
          ctx.clearRect(0, 0, canvas.width, canvas.height);
          confetti.forEach(c => {
            ctx.fillStyle = c.color;
            ctx.beginPath();
            if (shape === 'circle') {
              ctx.arc(c.x, c.y, c.r, 0, Math.PI * 2);
              ctx.fill();
            } else {
              ctx.fillRect(c.x, c.y, c.r, c.r);
            }
          });
          update();
        }

        function update() {
          confetti.forEach(c => {
            c.y += c.d * 3;
            if (c.y > canvas.height) {
              c.y = -10;
              c.x = Math.random() * canvas.width;
            }
          });
        }

        function animate() {
          draw();
          requestAnimationFrame(animate);
        }
        animate();
      }
    },

    init() {
      // Auto re-render on trait change
      this.on(
        'change:confetti-count change:confetti-min-size change:confetti-max-size change:confetti-shape change:confetti-colors',
        () => this.trigger('rerender')
      );
    }
  }
});

   
    // TEXT BLOCKS
    bm.add('title', {
      label: 'Title',
      category: 'Text',
      content: '<h1 style="text-align:center; font-family:\'Great Vibes\', cursive;">Happy Birthday!</h1>'
    });

    bm.add('paragraph', {
      label: 'Message',
      category: 'Text',
      content: '<p style="text-align:center;">Wishing you joy and happiness!</p>'
    });


    // LAYOUT BLOCKS
    bm.add('2-columns', {
      label: '2 Columns',
      category: 'Layout',
      content: `
        <div style="display:flex;">
          <div style="flex:1; padding:10px; border:1px dashed #ccc;">Left</div>
          <div style="flex:1; padding:10px; border:1px dashed #ccc;">Right</div>
        </div>
      `
    });

    bm.add('banner-bg', {
      label: 'Banner Background',
      category: 'Layout',
      content: `<div style="background: linear-gradient(45deg, #ff9a9e, #fad0c4); padding: 20px; text-align: center;">
        <h2 style="color: white;">Celebration Starts Here!</h2>
      </div>`
    });

    // BOOTSTRAP BLOCKS
    bm.add('bootstrap-row', {
      label: 'Bootstrap Row',
      category: 'Bootstrap',
      content: `
        <div class="row">
          <div class="col-md-6">Column 1</div>
          <div class="col-md-6">Column 2</div>
        </div>
      `
    });

    bm.add('bootstrap-card', {
      label: 'Card',
      category: 'Bootstrap',
      content: `
        <div class="card" style="width: 18rem;">
          <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card Title</h5>
            <p class="card-text">Some text inside the card.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      `
    });

  

    // // SEARCH BAR FOR ICON BLOCKS
    editor.on('load', () => {
      const openBlocksBtn = editor.Panels.getButton('views', 'open-blocks');
      if (openBlocksBtn) openBlocksBtn.set('active', 1);

      // Wait for UI to render before querying DOM
      setTimeout(() => {
        const bmPanel = editor.Panels.getPanel('views-container');
        if (!bmPanel) return;

        const blockPanel = bmPanel.view?.el?.querySelector('.gjs-pn-views .gjs-blocks-categories');
        if (!blockPanel) return;

        const searchInput = document.createElement('input');
        searchInput.id = 'icon-search';
        searchInput.placeholder = 'Search icons...';

        blockPanel.parentNode.insertBefore(searchInput, blockPanel);

        searchInput.addEventListener('input', () => {
          const query = searchInput.value.toLowerCase();
          const blocks = blockPanel.querySelectorAll('.gjs-block');
          blocks.forEach(block => {
            const text = block.innerText.toLowerCase();
            block.style.display = text.includes(query) ? '' : 'none';
          });
        });
        }, 500); // wait 100ms to allow UI to render
      });

    // Close all categories first
    const categories = bm.getCategories();
    categories.each(cat => cat.set('open', false));

    // Optional: Open first category if needed
    const firstCat = categories.at(0);
    if (firstCat) firstCat.set('open', true); 

    editor.on('component:selected', () => {
      const pn = editor.Panels;
      const openSmBtn = pn.getButton('views', 'open-sm');

      // If not already active, trigger it
      if (openSmBtn && !openSmBtn.get('active')) {
        openSmBtn.set('active', 1);
        pn.getButton('views', 'open-layers').set('active', 0); // deactivate layers if needed
        pn.getButton('views', 'open-blocks').set('active', 0); // deactivate blocks if needed
      }
    });

    editor.Panels.addButton('options', [{
      id: 'save-db',
      className: 'fa fa-save',
      command: 'save-db',  // This will link to a command defined below
      attributes: {
        title: 'Save to Database'
      }
    }]);  

    editor.Commands.add('save-db', {
      run(editor, sender) {
            alert('save button clicked');

        // Make sure sender is available
        const btnEl = sender && sender.el;

        // If no button element, log and continue (optional)
        if (!btnEl) {
          console.warn('Save button element not found.');
        } else {
          // Show spinner icon
          btnEl.classList.remove('fa-save');
          btnEl.classList.add('fa-spinner', 'fa-spin');
        }

        const html = editor.getHtml();
        const css = editor.getCss();
        const json = editor.getProjectData();

        fetch('{{ url("save-template") }}', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          },
          body: JSON.stringify({
            html,
            css,
            json,
            'tempid' : '{{ $template->id }}'
          })
        })
        .then(res => {
          if (!res.ok) throw new Error(`HTTP error! Status: ${res.status}`);
          return res.json();
        })
        .then(data => {
          alert('Template saved successfully!');
        })
        .catch(err => {
          console.error('Error saving:', err);
          alert('Error saving template.');
        })
        .finally(() => {
          // Restore save icon
          if (btnEl) {
            btnEl.classList.remove('fa-spinner', 'fa-spin');
            btnEl.classList.add('fa-save');
          }
        });
      }
    });


    

  </script>
</body>
</html>
