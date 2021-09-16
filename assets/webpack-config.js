// Require path.
const path                    = require('path')
const MiniCssExtractPlugin    = require('mini-css-extract-plugin')
const BUILD_DIR = path.resolve(__dirname, 'build')


// Configuration object.
const config = {
	// Create the entry points.
	// One for frontend and one for the admin area.
	entry: {
		// frontend and admin will replace the [name] portion of the output config below.
		webwolf: [
            './src/js/webwolf.js',
            './src/scss/webwolf.scss',
        ]
		
	},

	// Create the output files.
	// One for each of our entry points.
	output: {
		// [name] allows for the entry object keys to be used as file names.
		filename: 'js/[name].js',
		// Specify the path to the JS files.
		path: BUILD_DIR,
	},

	// Setup a loader to transpile down the latest and great JavaScript so older browsers
	// can understand it.
	module: {
		rules: [
			{
				// Look for any .js files.
				test: /\.js$/,
				// Exclude the node_modules folder.
				exclude: /node_modules/,
				// Use babel loader to transpile the JS files.
				loader: 'babel-loader'
			},
            {
                test: /\.scss$/,
                exclude: /node_modules/,
                use: [
                  MiniCssExtractPlugin.loader,
                  'css-loader',
                  //'postcss-loader',
                  'sass-loader',
                ]
              },
		]
	},
    plugins: [
  
        new MiniCssExtractPlugin({
          filename: 'css/[name].css'
        }),
      ],
}

// Export the config object.
module.exports = config;