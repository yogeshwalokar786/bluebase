import re
import os

def minify_css(css_content: str) -> str:
    tokens = []
    def save_token(m):
        tokens.append(m.group(0))
        return f"___TOKEN_{len(tokens)-1}___"

    pattern = r'("(?:\\.|[^"\\])*"|\'(?:\\.|[^\'\\])*\'|url\([^\)]*\))'
    protected = re.sub(pattern, save_token, css_content)
    protected = re.sub(r'/\*[\s\S]*?\*/', '', protected)

    calcs = []
    def save_calc(m):
        calcs.append(m.group(0))
        return f"___CALC_{len(calcs)-1}___"
    protected = re.sub(r'calc\([^\)]+\)', save_calc, protected)
    protected = re.sub(r'\s*([\{\}\:\;\,\>\+\~])\s*', r'\1', protected)

    protected = re.sub(r'\band\(', 'and (', protected)
    protected = re.sub(r'\)\band\b', ') and', protected)
    protected = re.sub(r'\bnot\(', 'not (', protected)
    protected = re.sub(r'\)\s*not\b', ') not', protected)
    protected = re.sub(r'\bor\(', 'or (', protected)
    protected = re.sub(r'\)\sor\b', ') or', protected)

    protected = re.sub(r';\}', '}', protected)
    protected = re.sub(r'\s+', ' ', protected)

    for i, c in enumerate(calcs):
        protected = protected.replace(f"___CALC_{i}___", c)

    for i, t in enumerate(tokens):
        protected = protected.replace(f"___TOKEN_{i}___", t)

    return protected.strip()

def minify_js(js_content: str) -> str:
    tokens = []
    def save_token(m):
        tokens.append(m.group(0))
        return f"___JSTOKEN_{len(tokens)-1}___"

    pattern = r'("(?:\\.|[^"\\])*"|\'(?:\\.|[^\'\\])*\'|`(?:\\.|[^`\\])*`)'
    protected = re.sub(pattern, save_token, js_content)
    protected = re.sub(r'/\*[\s\S]*?\*/', '', protected)

    lines = []
    for line in protected.splitlines():
        sub = re.split(r'//', line, maxsplit=1)
        cleaned_line = sub[0].strip()
        if cleaned_line:
            lines.append(cleaned_line)

    text = '\n'.join(lines)
    text = re.sub(r'\s*([\{\}\(\)\[\]\;\,\:\=\?\+\-\*\/\!\<\>\|\&])\s*', r'\1', text)
    text = re.sub(r'\b(return|typeof|instanceof|case|delete|throw|new|in|void|await|yield|async|const|let|var|function|class|extends)\b([a-zA-Z0-9_\$\(\{])', r'\1 \2', text)
    text = re.sub(r'([a-zA-Z0-9_\$])\b(instanceof|in)\b', r'\1 \2', text)

    for i, t in enumerate(tokens):
        text = text.replace(f"___JSTOKEN_{i}___", t)

    return text.strip()

if __name__ == '__main__':
    script_dir = os.path.dirname(os.path.abspath(__file__))
    laravel_dir = os.path.abspath(os.path.join(script_dir, '..')) if os.path.basename(script_dir) == 'scripts' else script_dir

    css_src = os.path.join(laravel_dir, 'resources', 'css', 'style.source.css')
    css_min = os.path.join(laravel_dir, 'public', 'css', 'style.min.css')
    css_out = os.path.join(laravel_dir, 'public', 'css', 'style.css')

    js_src = os.path.join(laravel_dir, 'resources', 'js', 'main.source.js')
    js_min = os.path.join(laravel_dir, 'public', 'js', 'main.min.js')
    js_out = os.path.join(laravel_dir, 'public', 'js', 'main.js')

    if os.path.exists(css_src):
        with open(css_src, 'r', encoding='utf-8') as f:
            raw_css = f.read()
        min_css = minify_css(raw_css)
        with open(css_min, 'w', encoding='utf-8') as f:
            f.write(min_css)
        with open(css_out, 'w', encoding='utf-8') as f:
            f.write(min_css)
        print(f"CSS minified: {len(raw_css):,} -> {len(min_css):,} bytes (saved {(1-len(min_css)/len(raw_css))*100:.1f}%)")

    if os.path.exists(js_src):
        with open(js_src, 'r', encoding='utf-8') as f:
            raw_js = f.read()
        min_js = minify_js(raw_js)
        with open(js_min, 'w', encoding='utf-8') as f:
            f.write(min_js)
        with open(js_out, 'w', encoding='utf-8') as f:
            f.write(min_js)
        print(f"JS minified:  {len(raw_js):,} -> {len(min_js):,} bytes (saved {(1-len(min_js)/len(raw_js))*100:.1f}%)")
