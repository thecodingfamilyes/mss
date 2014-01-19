guard :concat, :type => "css", :files => %w[styles fonts/bootstrap/glyphicons-halflings-regular.woff fonts/bootstrap/glyphicons-halflings-regular.svg fonts/bootstrap/glyphicons-halflings-regular.eot fonts/bootstrap/glyphicons-halflings-regular.ttf], :input_dir => "public/css", :output => "public/css/styles.min"

guard :concat, :type => "js", :files => %w[bootstrap/collapse bootstrap/dropdown bootstrap/scrollspy bootstrap/transition bootstrap/button bootstrap/tooltip bootstrap/tab bootstrap/alert bootstrap/carousel bootstrap/affix bootstrap/popover bootstrap/modal], :input_dir => "public/js", :output => "public/js/scripts.min"
=begin
# Refresh the browser on save
guard 'livereload' do
  watch(%r{.+(?<!\.min)\.(css|html|js|blade\.php)$})
end
=end
guard :phpunit2, :all_on_start => false, :tests_path => 'app/tests/', :cli => '--colors -c phpunit.xml' do
  # Run any test in app/tests upon save.
  watch(%r{^.+Test\.php$})

  # When a view file is updated, run tests.
  # Tip: you probably only want to run your integration tests.
  watch(%r{app/views/.+\.php}) { Dir.glob('app/tests/**/*.php') }

  # When a file is edited, try to run its associated test.
  # Save app/models/User.php, and it will run app/tests/models/UserTest.php
  watch(%r{^app/(.+)/(.+)\.php$}) { |m| "app/tests/#{m[1]}/#{m[2]}Test.php"}
end

module ::Guard
  class Refresher < Guard
    def run_all
      # refresh
    end

    def run_on_additions(paths)
      refresh
    end

    def run_on_removals(paths)
      refresh
    end

    def refresh
      `php artisan guard:refresh`
    end
  end
end

require 'cssmin'
require 'jsmin'

guard :refresher do
  watch(%r[public/js/.+])
  watch(%r[public/css/.+])
  watch(%r{app/config/packages/way/guard-laravel/guard.php}) do |m|
    `php artisan guard:refresh`
  end
  watch('public/css/styles.min.css') do |m|
    css = File.read(m[0])
    File.open(m[0], 'w') { |file| file.write(CSSMin.minify(css)) }
  end
  watch('public/js/scripts.min.js') do |m|
    js = File.read(m[0])
    File.open(m[0], 'w') { |file| file.write(JSMin.minify(js)) }
  end
end