const gulp = require('gulp');
const zip = require('gulp-zip');
const { series,parallel } = require('gulp');
//const del  = require('del');
const rename = require('gulp-rename');
var clean = require('gulp-clean');

function compressPackage() {
	return gulp.src([
		'../builds/guido/**',
		'../builds/guido/**/.**',
	])
		.pipe(zip('guido.zip'))
		.pipe(gulp.dest('../builds/'));

}
function copyPackage() {
	//del('../builds/booking-core/*/**',{force:true});

	return gulp.src([
		'**',
		'**/.*',
		'!.env',
		'!node_modules/**',
		'!.git/**',
		'!.idea/**',
		'!storage/installed',
		'!storage/app/public/**',
		'!storage/app/0000/**',
		'!storage/app/uploads/**',
		'!public/storage/**',
		'!storage/debugbar/**/*.json',
		'!storage/logs/**/*.log',
		'!storage/framework/cache/data/**',
		'!storage/framework/views/*.php',
		'!public/uploads/0000/**',
	])
		.pipe(gulp.dest('../builds/guido'));
}
function makeEnv() {
	return gulp.src([
		'.env.example',
	])
		.pipe(rename('.env'))
		.pipe(gulp.dest('../builds/guido'));
}

function backend(cb) {
	cb();
}
function frontend(cb) {
	cb();
}

function cleanBuildFolder(){
	return gulp.src('../builds/guido', {read: false, allowEmpty: true })
.pipe(clean({force: true}));
}
exports.default = series(parallel(backend,frontend),cleanBuildFolder,copyPackage);
exports.test = series(parallel(backend,frontend),cleanBuildFolder,copyPackage);
exports.zip = series(compressPackage);
